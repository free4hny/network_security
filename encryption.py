#Key Generation
print("Please enter the Caesar Cipher key that you would like to use. Please enter a number between 1 and 25 (both inclusive).")
key = int(input())

while key < 1 or key > 25:
  print("  Unfortunately, you have entered an invalid key. Please enter a number between 1 and 25 (both inclusive) only.")
  key = int(input())

print("  Thanks for selecting the Caesar Cipher key. The Key selected by you is " + str(key))


#The plain text message
#Allow the user to enter the plaintext message through the console
plain_text = str(input("Please enter the plain text message that you would like the Caesar Cipher Encryption Algorithm to encrypt for you."))
cipher_text = ""
print("  Thanks for entering the plain text message. You have entered the following plain text message.")
print("       " + plain_text)

#The Caesar Cipher Encryption algorithm
for letter in plain_text:
    if letter.isalpha():
        val = ord(letter)
        val = val + key
        if letter.isupper():
            if val > ord('Z'):
                val -= 26
            elif val < ord('A'):
                val += 26
        elif letter.islower():
            if val > ord('z'):
                val -= 26
            elif val < ord('a'):
                val += 26
        new_letter = chr(val)
        cipher_text += new_letter
    else:
        cipher_text += letter

print("  Cipher Text -----> " + cipher_text)


######################################################

# #The Caesar Cipher Decryption algorithm
# key1 = key
# key1 = -key1
# plain_text = ""
# print("  Cipher Text -----> " + cipher_text)

# for letter in cipher_text:
#     if letter.isalpha():
#         val = ord(letter)
#         val = val + key1
#         if letter.isupper():
#             if val > ord('Z'):
#                 val -= 26
#             elif val < ord('A'):
#                 val += 26
#         elif letter.islower():
#             if val > ord('z'):
#                 val -= 26
#             elif val < ord('a'):
#                 val += 26
#         new_letter = chr(val)
#         plain_text += new_letter
#     else:
#         plain_text += letter

# print("  Plain Text -----> " + plain_text)