#!/bin/bash

# --- CONFIGURATION ---
PYTHON_VENV_PATH="./venv"        # Path to your Python virtual environment
FLASK_APP_PATH="./models/app.py" # Path to your Flask app
SYMFONY_SERVER_PORT=8000         # Symfony local server port

# --- ACTIVATE PYTHON VENV ---
echo "Activating Python virtual environment..."
source "$PYTHON_VENV_PATH/bin/activate"

# --- RUN FLASK APP ---
echo "Starting Flask app..."
# Run Flask in background so Symfony can start
python "$FLASK_APP_PATH" &

FLASK_PID=$!
echo "Flask PID: $FLASK_PID"

# --- START SYMFONY SERVER ---
echo "Starting Symfony server..."
symfony server:start -d --port=$SYMFONY_SERVER_PORT

# --- CLEANUP ---
# Optional: trap to kill Flask if script exits
trap "echo 'Stopping Flask app...'; kill $FLASK_PID; exit" SIGINT SIGTERM

echo "All services started. Press Ctrl+C to stop."
wait
