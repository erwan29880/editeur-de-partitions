# fichiers à mettre en crontab 
# supprimer les fichiers du dossier enregistrements 
# vider les tables 
import sys
import argparse
import mysql.connector
import glob
import os


# vider le dossier enregistrement
class Remove_files:
    def __init__(self) -> None:
        self.path = "./files/enregistrement/"
        
    # lister les fichiers
    def list_files(self) -> list:
        return [self.path+x for x in os.listdir(self.path)]
    
    # supprimer les fichiers
    def main(self):
        li = self.list_files()
        if len(li) == 0:
            return False
        try:
            for f in self.list_files():
                os.remove(f)
        except Exception as e:
            print(e)
            return False
        return True


# vider les tables editeur et images si besoin
class Truncate:
    def __init__(self) -> None:
        self.__conn = None
        self.__cursor = None 
        
    def __connect(self):
        try:
            self.__conn = mysql.connector.connect(host = "localhost",
                                                port = 3306,
                                                database = "accordeon",
                                                user = "root",
                                                password = "pa")
            self.__cursor = self.__conn.cursor()
        except Exception as e:
            print(e)
            sys.exit()
            
            
    def __close(self):
        if self.__cursor is not None:
            self.__cursor.close()
        if self.__conn is not None:
            self.__conn.close()        
    
    def main(self):
        self.__connect()
        
        try:
            sqls = ["TRUNCATE TABLE editeur;", "TRUNCATE TABLE images;"]
            [self.__cursor.execute(x) for x in sqls]
            self.__conn.commit()
        except Exception as e:
            print(e)
        finally:
            self.__close()
            sys.exit()  
                  
            
            


if __name__ == "__main__":
    argParser = argparse.ArgumentParser()
    argParser.add_argument("-t", "--truncate", help="truncate tables if needed : true / false")
    args = argParser.parse_args()
    
    r = Remove_files()
    r.main()
    print("Files removed")
    
    if args.truncate == "true" or args.truncate == "True":
        print("Tables truncated")
        t = Truncate()
        t.main()
    
   