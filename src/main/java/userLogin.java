import java.io.*;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.sql.*;

/**
 * Servlet implementation class userLogin
 */
@WebServlet("/userLogin")
public class userLogin extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public userLogin() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.getWriter().append("Served at: ").append(request.getContextPath());
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		String uID=request.getParameter("userID");
		String password=String.valueOf(request.getParameter("pwd"));
		String empty="";
//		System.out.println(uID);
		try {
		Connection conn=DBConnection.intializeDB("crs");
		Statement st=conn.createStatement();
		String qry="SELECT password from logins where userid='"+uID+"' ";
		ResultSet rs= st.executeQuery(qry);
		String ActualPassword="";
		while(rs.next()) {
			ActualPassword=rs.getString(1);
		}
		if(uID==empty || password==empty) {
			response.sendRedirect("login-page.html");	
		}
		
		if(uID.equals("Admin") && password.equals("Admin123")) {
			response.sendRedirect("admin_home.html");	
		}
		
		//System.out.println(password);
		if(ActualPassword.equals(password)) {
			System.out.println("Login success");
			String quer="delete from current_cust where custid>=0";
			st.executeUpdate(quer);
			quer="select custid from logins where userid='"+uID+"'";
			rs=st.executeQuery(quer);
			int cid=0;
			while(rs.next()) {
				cid=rs.getInt(1);
			}
			quer="insert into current_cust values('"+cid+"')";
			st.executeUpdate(quer);
			quer="select * from paymentqueue where custid='"+cid+"'";
			rs=st.executeQuery(quer);
			boolean flag=false;
			while(rs.next()) {
				flag=true;
			}
			if(!flag) response.sendRedirect("SearchPage2.php"); 
			else response.sendRedirect("finalize.php"); 
		}
		else {
			System.out.println("Incorrect!!!!");
			response.sendRedirect("login-page.html");
		}
		
		}
		catch(Exception e)
		{
		System.out.print(e);
		e.printStackTrace();
		}
		
//		response.sendRedirect("Searchpage.html"); 
		
	}

}
