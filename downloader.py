import requests
import zipfile
import io
import os

def download(url): 
    r = requests.get(url)
    z = zipfile.ZipFile(io.BytesIO(r.content))
    z.extractall(os.path.abspath("telechargement"))
    print("ok")

download("https://www.data.gouv.fr/fr/datasets/r/88fbb6b4-0320-443e-b739-b4376a012c32")

