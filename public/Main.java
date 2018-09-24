
import java.util.InputMismatchException;
import java.util.Scanner;


public class Main{

    public static int vector[];

        public static int n;

        public static void main(String[] args) {

            Scanner T = new Scanner(System.in);
            try{
               n = 5;

                if (n <= 0){
                }
                    System.err.println("Error, el numero ingresado es igual o menor cero");
                    System.exit(0);
                }

                vector = new int[n];


                generarDatos(n-1,0);
                System.out.println("Derecha");
                derecha(n,0);
                System.out.println();
                System.out.println("Izquierda");
                izquierda(n-1);
            }catch (InputMismatchException e){
                System.err.println("Agregaste un dato erroneo");
            }catch (StackOverflowError stackOverflowError){
                System.err.println("Error: "+stackOverflowError.getMessage());

            }catch (Exception e){
                System.err.println("Error: "+e.getMessage());

            }


        }

        public static void generarDatos(int n,int aux){



            if (aux <= n){

                vector[aux] = (int) (Math.random() * 10);
                generarDatos(n,aux+1);
            }



        }




        public static void derecha(int n,int aux){


            if (aux <= (n-1)){

              System.out.print(vector[aux]+" ");

                derecha(n,aux+1);
            }




        }


        public static void izquierda(int n){



            if (n >= 0){

                System.out.print(vector[n]+" ");

                izquierda(n-1);
            }






        }
    }