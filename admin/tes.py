import os
username = "miftahul_huda"
password = "hdm212"
i = "Anda Harus Login\n"
a = None

print(i)
while True:
    if a == "password_salah":
        os.system("cls")
        print(i, "\nPassword yang anda masukkan salah, silahkan coba kembali!")
    elif a == "username_salah":
        os.system("cls")
        print(i, "\nUsername tidak cocok, coba kembali!")

    usernamel = input("Masukkan Username: ")
    passwordl = input("Masukkan Password: ")
    if usernamel == username:
        if passwordl == password:
            os.system("cls")
            break
        else:
            a = "password_salah"
    else:
        a = "username_salah"

print("Anda Telah Login....")