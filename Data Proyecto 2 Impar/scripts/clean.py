import pandas as pd

# Leer el archivo CSV
df = pd.read_csv('Data Proyecto 2 Impar/scripts/datos_personas.csv')

# Obtener los datos como listas
nombres = df["Nombre"].tolist()
apellidos = df["Apellido"].tolist()
edades = df["Edad"].tolist()

# Imprimir los datos en un formato adecuado para PHP
print("\n".join([f"{nombre},{apellido},{edad}" for nombre, apellido, edad in zip(nombres, apellidos, edades)]))
