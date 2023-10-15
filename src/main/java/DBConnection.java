
import java.sql.*;
public class DBConnection {

	public static Connection intializeDB(String dbName) throws ClassNotFoundException {
		// TODO Auto-generated method stub
		String dbUrl="jdbc:mysql://localhost:3306/";
		String dbDriver="com.mysql.jdbc.Driver";
		
		String dbUser="root";
		String dbPass="";
		
		Connection conn=null;
		Class.forName(dbDriver);
		try {
			conn=DriverManager.getConnection(dbUrl+dbName,dbUser,dbPass);
			System.out.println("Connected to the database");
			
		}
		catch(SQLException e) {
			System.out.println(e);
		}
		
		return conn;

	}

}