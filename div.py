import numpy as np
import matplotlib.pyplot as plt

def curva_suavizada(x, A=0.2, B=20):
    return x + A * np.sin(np.pi * x)**2 * np.exp(-B * (x - np.floor(x) - 0.5)**2)

x = np.linspace(0, 5, 500)
y = curva_suavizada(x)

plt.plot(x, y, label='y = x + curvatura suave')
plt.scatter(np.arange(6), np.arange(6), color='red', label='Puntos enteros (y = x)')
plt.xlabel('x')
plt.ylabel('y')
plt.legend()
plt.grid()
plt.show()