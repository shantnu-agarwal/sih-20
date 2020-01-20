import nltk
from nltk.stem.lancaster import LancasterStemmer
stemmer = LancasterStemmer()

from flask import *


import numpy
import tensorflow
import tflearn
import random
import json
import pickle 
from mysql import *
import math
import mysql.connector

app = Flask(__name__)

with open("intents.json") as file:
	data = json.load(file)
with open("data.pickle","rb") as f:
	words, labels, training, output = pickle.load(f)

tensorflow.reset_default_graph()
net = tflearn.input_data(shape=[None, len(training[0])])
net = tflearn.fully_connected(net, 8)
net = tflearn.fully_connected(net, 8)
net = tflearn.fully_connected(net, len(output[0]), activation="softmax")
net = tflearn.regression(net)
model = tflearn.DNN(net)
model.load("model.tflearn")
print("MODEL LOADED")


def bag_of_words(s, words):
	bag = [0 for _ in range(len(words))]
	s_words = nltk.word_tokenize(s)
	s_words = [stemmer.stem(word.lower()) for word in s_words]

	for se in s_words:
		for i, w in enumerate(words):
			if w == se:
				bag[i] = 1
			
	return numpy.array(bag)


def chat(inp):
	if inp.lower() == "quit":
		return("BYE")
	results = model.predict([bag_of_words(inp, words)])
	results_index = numpy.argmax(results)
	tag = labels[results_index]

	for tg in data["intents"]:
		if tg['tag'] == tag:
			responses = tg['responses']
	rsp = random.choice(responses)
	print(type(rsp))
	print(rsp)
	if rsp=="rice" or rsp=="potato":
		print("Starting the connection with Azure SQL")
		cnx = mysql.connector.connect(user="astroller27@kisaan2020", password="WeGotThis101", host="kisaan2020.mysql.database.azure.com", port=3306, database="world")
		# print(cnx)
		curs = cnx.cursor()
		curs.execute(("select CAST(price as CHAR(20)) as col1 from crops where name = '{}';").format(rsp))
		for row in curs:
			for col in row:
				print(col)
				return col
	else:
		return(rsp)

@app.route("/")
def hello():
	return "Hello World!"

@app.route("/userinput",methods = ['POST'])
def userinput():
	if request.method == 'POST':
		user = request.form['nm']
		reply = chat(user)
		return render_template("bot.html",error=reply)

print("All prerequisites passed. Starting application now.")
app.run(debug=True)