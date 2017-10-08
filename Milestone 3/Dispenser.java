/**
 * Trevor Moore
 * Jordan Riley
 * Antonio Jabrail
 * CST-135
 * Milestone 3
 * 9/24/2017
 */

public class Dispenser {

	//member variables
	//dispenser HAS-A array of products
	private Product[] products;
	//change is to store money in the dispenser
	private double change;
	
	//constructor with no arguments that populates the array of products and the change
	public Dispenser() {
		
		//array of 10 products, index starting at 0 going to 9
		products  = new Product[10];
		//instantiates change to 10
		change = 10.00;
		
		//for loop that loops through the length of the array in order to instantiate all products
		//in the array
		for (int i = 0; i < products.length; i++) {
			products[i] = new Drink();
			products[i].setName("Test product: "+i);
			products[i].setDescription("Test description");
			products[i].setPrice(1.00);
		}
		
	}

	//methods for operating dispenser
	public void restockProduct() {
		
	}
	
	//method for printing receipt after purchase
	public void printReceipt() {
		
	}
	
	//method that will dispense products
	public void dispenseProduct() {
		
	}
	
	//method for buying a product that passing in a product in the argument
	public void buyProduct(Product p) {
		
	}
	
	//method for viewing a specific product that is passed through the argument
	public void viewProduct(Product p) {
		
	}
	
	//method for inputing money in order to buy a product, with the amount being passed through
	//in the argument
	public void inputMoney(double amount) {
		
	}
	
	//method that loops through all products in the Product array and prints the toString
	public void displayProducts() {
		for (Product p : products) {
			System.out.println(p.toString());
		}
	}

	
	//getters and setters
	public Product[] getProducts() {
		return products;
	}


	public void setProducts(Product[] products) {
		this.products = products;
	}



	public double getChange() {
		return change;
	}



	public void setChange(double change) {
		this.change = change;
	}
	
}