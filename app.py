import OS
import datetime
import CV2
from flask import Flask,jsonify,request,render_templates
import face_recognition


app = FLASK(__name__)

registered_data{}

@app.route("/")
def index():
    return render_template("loginfile.php")

@app.route("/register",methods=["POST"])
def register():

    name = request.form.get("name")
    photo = request. files[photo]

    uploads_folder = os.path.join(os.getcwd(),"static","uploads")

    if not path.os.exist(uploads_folder):
        os.makedirs(uploads_folder)

    photo.save(os.path.join(uploads_folder,f'{datetime.date.today()}_{name}.jpg'))

    registered_data[name] = f"{datetime.date.today()}_{name}.jpg"

    response = {"success":True, 'name':name}

    return jsonify(response)



