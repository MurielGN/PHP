import java.io.*;
import java.net.*;
import java.util.logging.Level;
import java.util.logging.Logger;
import java.util.HashMap;
import java.util.Map;
import java.util.Scanner;

/**
 * Servidor Multihilo TCP, hace eco de lo que recibe
 */

public class ServerMTCP {

	public static void main(String args[]) {

		// Establecemos el número de puerto a utilizar.
		int serverPort = 4444;

		// Creamos una instancia para esperar las peticiones de los clientes.
		ServerSocket listenSocket;

		// Socket para conexión.
		Socket clientSocket;

		// Usamos la clase conection.
		Connection c;

		try {

			// Creamos el objeto para esperar peticiones de los clientes.
			listenSocket = new ServerSocket(serverPort);

			// CICLO DEL SERVIDOR
			while (true) {

				// Dejamos invocado el servidor esperando haste que un cliente
				// se conecte. clientSocket = Socket nuevo para comunicaciones.
				clientSocket = listenSocket.accept();
				System.out.println(
						" NUEVO CLIENTE: " + clientSocket.getInetAddress() + " PUERTO:" + clientSocket.getPort());
				// Se establece la conexión, y se vuelve a esperar un nuevo cliente.
				c = new Connection(clientSocket);

			}

			// Control de excepciones.
		} catch (IOException e) {
			System.out.println("Error en socket: " + e.getMessage());
		}
	}
}

/**
 *
 * @author Iván Durango Hilo de ejecución que procesa cada una de la peticiones
 */
class Connection extends Thread {

	// Instanciamos los flujos de datos de entrada y salida,y el socket para
	// conexión.
	Socket clientSocket;
	BufferedReader entrada = null;
	PrintWriter salida = null;

	// Tratamiento de Bot Eliza
	public static String procesarMensaje(String cadena) {
		if (contienePalabrota(cadena)) {
			return burla(cadena);
		}
		
		HashMap<String, String> theliza = new HashMap<String, String>();

		theliza.put("HOLA", "Hola, ¿qué tal?");
		theliza.put("ENCANTADO", "Encantado de conocerte yo también");
		theliza.put("ADIOS", "Adiós, espero volverte a ver pronto");
		theliza.put("HORA", "Lo siento, no llevo reloj");
		theliza.put("NOMBRE", "Mi nombre es Eliza");

		cadena = cadena.toUpperCase();
		boolean encontrado = false;
		for (Map.Entry<String, String> entrada : theliza.entrySet()) {			
			if (cadena.contains(entrada.getKey())) {
				return entrada.getValue();
			}
		}
		return "Lo siento, no te comprendo.";
	}

	//Creamos un metodo para hacer burla.
	private static String burla(String cadena) {
		char vocal[] = new char[] {'e', 'i', 'u'};
		//char consonate[] = new char[] {'n', 'm', 't'};
		int nvocal = (int) (Math.random()*3);
		//int ncons = (int) (Math.random()*3);
		for (int i = 0; i < cadena.length(); i++) {
			char aux = cadena.charAt(i);
			if ("aeiou".contains(String.valueOf(aux).toLowerCase())) {
				cadena = cadena.substring(0, i) + vocal[nvocal] + cadena.substring(i+1, cadena.length());
			}
			/*if ("bcdfghjklmnñpqrstvwxyz".contains(String.valueOf(aux).toLowerCase())) {
				cadena = cadena.substring(0, i) + consonate[ncons] + cadena.substring(i+1, cadena.length());
			}*/
		}
		return cadena;
	}

	//Buscamos palabronas en el mensaje.
	private static boolean contienePalabrota(String cadena) {
		//Lista sacada de los 10 insultos mas usados en españa.
		String palabrotas[] = new String[] {"caca", "culo", "pedo", "pis", "subnormal", "tonta", "idiota", "capulla", "payasa"};
		for (String palabrota: palabrotas) {
			if (cadena.toLowerCase().contains(palabrota)) {
				return true;
			}
		}
		return false;
	}

	// Constructor.
	public Connection(Socket aSocket) {

		// Asocia el Socket(this) con el del cliente que conecta.
		clientSocket = aSocket;

		try {

			// Creamos los flujos de entrada y salida de datos, y lo se los
			// asociamos al socket cliente.
			// Establece canal de entrada
			entrada = new BufferedReader(new InputStreamReader(clientSocket.getInputStream()));
			// Establece canal de salida
			salida = new PrintWriter(new BufferedWriter(new OutputStreamWriter(clientSocket.getOutputStream())), true);

		} catch (IOException ex) {
			System.out.println("Error en conexion: " + ex.getMessage());
		}

		// Lanzamos el método run.
		this.start();
	}

	public void run() {

		try {

			while (true) {
				// Recibe los datos mandados por el cliente.
				String msg = entrada.readLine();
				System.out.println("Cliente: " + msg);
				// Si el mensaje es de terminar
				if (msg.equals("Adios"))
					break;
				// Realiza la réplica de los datos
				salida.println(">>" + procesarMensaje(msg));
			}

			// Control de excepciones.
		} catch (Exception ex) {
			System.err.println(" Fin / Error de conexión." + clientSocket.getInetAddress() + "\n");
		}
	}
}

