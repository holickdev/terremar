import math

def trapecio(f, a, b, n):
    """
    Aproxima la integral de f en el intervalo [a, b] usando el método del trapecio.

    Parámetros:
    f: función a integrar.
    a: límite inferior del intervalo.
    b: límite superior del intervalo.
    n: número de trapecios.

    Retorna:
    Aproximación de la integral de f en [a, b].
    """
    # Longitud de cada subintervalo
    h = (b - a) / n

    # Suma de los extremos del intervalo
    integral = f(a) + f(b)

    # Suma de los valores de f(x) en los puntos internos
    for i in range(1, n):
        integral += 2 * f(a + i * h)

    # Multiplicación final por h/2
    integral *= h / 2
    return integral

# Ejemplo de uso
# Definir la función a integrar, por ejemplo: f(x) = x^2
f = lambda x: x*math.cos(x**2)

# Parámetros del intervalo de integración y número de trapecios
a = 0
b = math.pi/2
n = 10000

# Llamada a la función
resultado = trapecio(f, a, b, n)
print(f"La aproximación de la integral es: {resultado}")
# print((1/6)*(math.e**(3*(1**2))))
# print((1/6)*(math.e**(3*(0**2))))
# print((1/6)*(math.e**(3*(1**2)))-(1/6)*(math.e**(3*(0**2))))
