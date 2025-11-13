from flask import Flask, request, jsonify
import numpy as np
import joblib
import pandas as pd
from os import path

app = Flask(__name__)
BASE_DIR = path.dirname(__file__)  # directory of app.py
predict_model = joblib.load(path.join(BASE_DIR, 'supervised_model.pkl'))
cluster_model = joblib.load(path.join(BASE_DIR, 'clustering_model.pkl'))

@app.route('/predict', methods=['POST'])
def predict():
    data = request.get_json()
    df = pd.DataFrame([data])
    prediction = predict_model.predict(df)[0]
    if isinstance(prediction, np.integer):
        prediction = int(prediction)

    return jsonify({'stress_level': prediction})

@app.route('/cluster', methods=['POST'])
def cluster():
    data = request.json
    df = pd.DataFrame([data])

    # Predict cluster
    cluster_label = int(cluster_model.predict(df)[0])
    return jsonify({'cluster': cluster_label})

def generate_recommendations(user_features):
    recommendations = []

    if user_features.get('blood_pressure') > 3:
        recommendations.append("Consider consulting a healthcare professional for blood pressure management.")
    elif user_features.get('blood_pressure') < 2:
        recommendations.append("Maintain a healthy lifestyle to keep blood pressure in check.")

    if user_features.get('depression') > 15:
        recommendations.append("Seek professional mental health support or therapy for depression.")
    elif user_features.get('depression') < 5:
        recommendations.append("Continue practicing self-care and maintaining positive social connections to manage mood.")

    if user_features.get('anxiety_level') > 15:
        recommendations.append("Explore relaxation techniques like mindfulness or deep breathing, and consider professional help for anxiety.")
    elif user_features.get('anxiety_level') < 5:
        recommendations.append("Your anxiety levels are low. Keep engaging in activities that bring you joy and calm.")

    if user_features.get('academic_performance') < 2:
        recommendations.append("Look into academic support, study groups, or time management strategies to improve performance.")
    elif user_features.get('academic_performance') > 3:
        recommendations.append("Maintain your strong academic habits.")

    if user_features.get('basic_needs') < 2:
        recommendations.append("Ensure your basic needs (food, shelter, safety) are met. Seek community resources if needed.")
    elif user_features.get('basic_needs') > 3:
        recommendations.append("Good job in ensuring your basic needs are met, which is fundamental for well-being.")

    if user_features.get('sleep_quality') < 2:
        recommendations.append("Improve sleep hygiene: establish a consistent sleep schedule, create a relaxing bedtime routine, and avoid screens before bed.")
    elif user_features.get('sleep_quality') > 3:
        recommendations.append("You have good sleep quality; continue your healthy sleep habits.")

    if not recommendations:
        recommendations.append("Based on your current inputs, no specific high-priority stress management recommendations were generated. Continue maintaining a balanced lifestyle.")

    return recommendations

@app.route('/recommend', methods=['POST'])
def recommend():
    data = request.json
    recs = generate_recommendations(data)
    return jsonify({'recommendations': recs})

if __name__ == '__main__':
    app.run(port=5000)
