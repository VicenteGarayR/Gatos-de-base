import csv
from faker import Faker
import random

fake = Faker()

# Configuración del número de registros y nombre del archivo CSV
num_records = 10
csv_filename = 'datos_personas.csv'

# Crear el archivo CSV y escribir la cabecera
with open(csv_filename, 'w', newline='') as csvfile:
    fieldnames = ['Nombre', 'Apellido', 'Edad']
    writer = csv.DictWriter(csvfile, fieldnames=fieldnames)
    writer.writeheader()

    # Generar datos aleatorios con variaciones en los nombres
    for _ in range(num_records):
        nombre = fake.first_name()
        apellido = fake.last_name()

        # Introducir variaciones o "errores" en los nombres
        if random.choice([True, False]):
            nombre = nombre.upper()

        if random.choice([True, False]):
            apellido = apellido.upper()

        # Generar edad aleatoria entre 18 y 99
        edad = random.randint(18, 99)

        # Escribir la fila en el archivo CSV
        writer.writerow({'Nombre': nombre, 'Apellido': apellido, 'Edad': edad})

print(f'Se ha creado el archivo CSV: {csv_filename}')