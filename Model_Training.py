import pandas as pd
import numpy as np
from sklearn.naive_bayes import MultinomialNB
from sklearn.model_selection import train_test_split 
from sklearn.metrics import classification_report
from sklearn.metrics import confusion_matrix
from sklearn.metrics import accuracy_score


df = pd.read_csv("Training.csv")

print(len(df))
cols = df.columns
print(cols)
cols = cols[:-1]

X = df[cols]
Y = df['prognosis']
t_size = 0.33
X_train, X_test, Y_train, Y_test = train_test_split(X, Y, test_size=t_size,random_state=42)

model =  MultinomialNB()
model=model.fit(X_train,Y_train)
model.score(X_test, Y_test)


model.predict(X_test[:1])
accuracy_score(Y_train,model.predict(X_train))

import pickle
with open("diagnosis_model.pkl","wb") as f:
    pickle.dump(model,f)