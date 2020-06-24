import numpy as np
from flask import Flask, request, jsonify, render_template
import pickle

app = Flask(__name__)
model = pickle.load(open('diagnosis_model.pkl', 'rb'))

@app.route('/predict',methods=['POST'])
def predict():
    data = request.get_json(force=True)
    #userinput1 =[0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
    #userinput2 = data["parameter"]
    #print(data);
    
    #print(type(userinput1))
    #print([userinput2])
    user = []
    for i in data:
        user.append(int(i))
    #print(type(user))    
    #print(user)
    #print(type(userinput2))
    #print(userinput1)
       
    prediction = model.predict([user])
    print(prediction[0])
    
    return prediction[0]


if __name__ == "__main__":
    app.run(debug=True)