#!/usr/bin/env bash

# Exit immediately if a command fails
set -e

# --- CONFIG ---
PYTHON_VERSION=python3
VENV_DIR="venv"

echo "----------------------------------------"
echo "🔧 Symfony + Flask Setup Script"
echo "----------------------------------------"

# --- Check PHP & Composer ---
echo "👉 Checking PHP & Composer..."

if ! command -v php &>/dev/null; then
    echo "⚠️ PHP not found. Please install PHP before running this script."
    exit 1
fi

if ! command -v composer &>/dev/null; then
    echo "⚠️ Composer not found. Installing composer..."
    EXPECTED_SIGNATURE=$(wget -q -O - https://composer.github.io/installer.sig)
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    ACTUAL_SIGNATURE=$(php -r "echo hash_file('sha384', 'composer-setup.php');")

    if [ "$EXPECTED_SIGNATURE" != "$ACTUAL_SIGNATURE" ]; then
        echo "ERROR: Invalid Composer installer signature"
        rm composer-setup.php
        exit 1
    fi

    php composer-setup.php --quiet
    rm composer-setup.php
    sudo mv composer.phar /usr/local/bin/composer
fi

echo "✅ PHP and Composer OK."

# --- Install Symfony dependencies ---
if [ -f "composer.json" ]; then
    echo "📦 Installing Symfony dependencies..."
    composer install --no-interaction --prefer-dist
else
    echo "⚠️ composer.json not found, skipping Symfony dependencies."
fi

# --- Python environment setup ---
echo "🐍 Setting up Python environment..."

if ! command -v $PYTHON_VERSION &>/dev/null; then
    echo "⚠️ $PYTHON_VERSION not found. Installing..."
    sudo apt install -y python3 python3-venv python3-pip || sudo dnf install -y python3 python3-venv python3-pip
fi

if [ ! -d "$VENV_DIR" ]; then
    echo "🆕 Creating virtual environment in '$VENV_DIR'..."
    $PYTHON_VERSION -m venv $VENV_DIR
else
    echo "♻️ Using existing virtual environment at '$VENV_DIR'."
fi

# Activate virtual environment
echo "✅ Activating virtual environment..."
source $VENV_DIR/bin/activate

# Install Python dependencies
if [ -f "requirements.txt" ]; then
    echo "📦 Installing Python dependencies..."
    pip install --upgrade pip
    pip install -r requirements.txt
else
    echo "⚠️ requirements.txt not found. Skipping Python dependencies."
fi

echo "----------------------------------------"
echo "✅ Setup complete!"
echo "To start your app use the run.sh script"
echo "----------------------------------------"
