integer = input()

divider = input()

for i in range (len(integer)):
    for i in range(10):
        if int(divider)*i == int(integer[0]):
            print(i,end="")
