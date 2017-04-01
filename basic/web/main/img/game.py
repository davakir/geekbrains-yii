matrix = list(zip(*[[1, 2, 3, 4, 5], [1, 2, 3, 4, 5]]))
print(matrix)

from tkinter import *
from random import shuffle

main_window = Tk()
main_window.title('Reminder')


def func():
    print('Fuck yourself')


def hide_all(btns):
    for i in range(SIDE):
        for j in range(SIDE):
            btns[i][j].configure(text=' ? ')


SIDE = 6
QSIDE = (SIDE ** 2) // 2


ls = []
for i in range(1, 100):
    ls.append(i)

shuffle(ls)
ls = ls[:QSIDE] * 2
shuffle(ls)
print(ls)

buttons = []
for i in range(SIDE):
    for j in range(SIDE):
        x = ls[i * SIDE + j]
        button = Button(main_window,
                        text='{:>3}'.format(x),
                        font=('Courier New', 12, 'normal'),
                        relief=FLAT,
                        command=func)
        buttons[i].append(button)
        # button.pack()
        button.grid(row=i, column=j)


main_window.after(5000, hide_all, buttons)
main_window.mainloop()
