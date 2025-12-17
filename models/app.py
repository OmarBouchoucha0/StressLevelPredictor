from flask import Flask, request, jsonify
import numpy as np
import joblib
import pandas as pd
from os import path

app = Flask(__name__)
BASE_DIR = path.dirname(__file__)  # directory of app.py
predict_model = joblib.load(path.join(BASE_DIR, 'supervised_model.pkl'))
cluster_model = joblib.load(path.join(BASE_DIR, 'clustering_model.pkl'))
svr = joblib.load(path.join(BASE_DIR,'stress_svr_model.pkl'))
kmeans = joblib.load(path.join(BASE_DIR,'stress_kmeans_model.pkl'))
scaler = joblib.load(path.join(BASE_DIR,'stress_scaler.pkl'))
metadata = joblib.load(path.join(BASE_DIR,'model_metadata.pkl'))

TOP_FEATURES = metadata['features']
CLUSTER_MAPPING = metadata['cluster_mapping']

@app.route('/predict', methods=['POST'])
def predict():
    # data = request.get_json()
    # df = pd.DataFrame([data])
    # prediction = predict_model.predict(df)[0]
    # if isinstance(prediction, np.integer):
    #     prediction = int(prediction)
    #
    # return jsonify({'stress_level': prediction})
    #
    data = request.get_json()
    df = pd.DataFrame([data])

    # 1. Select & Scale
    X_selected = df[TOP_FEATURES]
    X_scaled = scaler.transform(X_selected)

    # 2. SVR Prediction
    score = svr.predict(X_scaled)[0]
    print(score)
    return jsonify({
        'stress_level': int(round(score*50, 5))
    })

@app.route('/cluster', methods=['POST'])
def cluster():
    # 1. Get data from request
    data = request.json
    df = pd.DataFrame([data])

    try:
        # 2. Select only the TOP_FEATURES used during training
        # This prevents the model from crashing if extra data is sent
        df_selected = df[TOP_FEATURES]

        # 3. Apply the same scaler used during training
        # CRITICAL: K-Means is very sensitive to feature scales
        X_scaled = scaler.transform(df_selected)

        # 4. Predict the cluster integer
        cluster_id = int(kmeans.predict(X_scaled)[0])

        # 5. Map the integer to the label (Low, Moderate, High)
        # Using the mapping dictionary we created earlier
        category_name = CLUSTER_MAPPING.get(cluster_id, "Unknown")

        return jsonify({
            'cluster_id': cluster_id,
            'category': category_name
        })

    except Exception as e:
        return jsonify({'error': str(e)}), 400

def generate_recommendations(user_features):
    recommendations = []

    if user_features.get('depression') > 15:
        recommendations.append("Seek professional mental health support or therapy for depression.")
    elif user_features.get('depression') < 5:
        recommendations.append("Continue practicing self-care and maintaining positive social connections to manage mood.")

    if user_features.get('anxiety_level') > 15:
        recommendations.append("Explore relaxation techniques like mindfulness or deep breathing, and consider professional help for anxiety.")
    elif user_features.get('anxiety_level') < 5:
        recommendations.append("Your anxiety levels are low. Keep engaging in activities that bring you joy and calm.")

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
