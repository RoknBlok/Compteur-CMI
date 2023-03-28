import sqlite3
import keyboard
import time

def incr() :
    print("\n+1")
    sqlite_select_Query = """UPDATE compeurDB SET nombre_de_personne = nombre_de_personne + 1 WHERE id=1;"""
    cursor.execute(sqlite_select_Query)
    sqliteConnection.commit()
    while keyboard.is_pressed('a') :
        time.sleep(0.5)

def decr() :
    print("\n-1")
    sqlite_select_Query = """UPDATE compeurDB SET nombre_de_personne = nombre_de_personne - 1 WHERE id=1;"""
    cursor.execute(sqlite_select_Query)
    sqliteConnection.commit()
    while keyboard.is_pressed('b') :
        time.sleep(0.5)

#connexion
sqliteConnection = sqlite3.connect('db.sqlite')
cursor = sqliteConnection.cursor()
print("Connected to SQLite")
'''
capteur1 = bool(False)
capteur2 = bool(False)
'''
while True :
    if keyboard.is_pressed('a') :
        if keyboard.is_pressed('b') :
            incr()

    elif keyboard.is_pressed('b') :
        if keyboard.is_pressed('a') :
            decr()




cursor.close()

'''
a=0
if a==0 :
    cur.execute("UPDATE compeurDB SET nombre_de_personne = nombre_de_personne + 1 WHERE id=1")
    
elif a==1 :
    cur.execute("UPDATE compeurDB SET nombre_de_personne = nombre_de_personne - 1 WHERE id=1")


cur.execute("SELECT nombre_de_personne FROM compeurDB WHERE id = 1")
resulat=cur.fetchall()
for row in resulat:
    print(row)

conn.close()




#test

import sqlite3

try:
    sqliteConnection = sqlite3.connect('db.sqlite')
    cursor = sqliteConnection.cursor()
    print("Connected to SQLite")

    sqlite_select_Query = "select sqlite_version();"
    cursor.execute(sqlite_select_Query)
    record = cursor.fetchall()
    print("SQLite Database Version is: ", record)
    cursor.close()

except sqlite3.Error as error:
    print("Error while connecting to sqlite", error)
finally:
    if sqliteConnection:
        sqliteConnection.close()
        print("The SQLite connection is closed")

'''