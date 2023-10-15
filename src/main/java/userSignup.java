

import java.io.*;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.sql.*;

@WebServlet("/userSignup")
public class userSignup extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public userSignup() {
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
		// TODO Auto-generated method stub
		
		String name=request.getParameter("name");
		String dl_no=request.getParameter("dl_no");
		String email=request.getParameter("email");
		String uID=request.getParameter("userID");
		String password=request.getParameter("pwd");
		Date dob=Date.valueOf(request.getParameter("dob"));
		String mobile=request.getParameter("m_no");
		PrintWriter out=response.getWriter();
		
		
		try
		{
		
		//Class.forName("com.mysql.jdbc.Driver");
		//Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/"+"crs", "root", "");
			Connection conn=DBConnection.intializeDB("crs");
		//System.out.println("connected");
		
		Statement st=conn.createStatement();
		st.executeUpdate("insert into customer(name,dl_no,email,dob,mobile) values('"+name+"','"+dl_no+"','"+email+"','"+dob+"','"+mobile+"')");
		String qry="SELECT custid from customer where email='"+email+"' ";
		ResultSet rs= st.executeQuery(qry);
		String tcustid="";
		while(rs.next()) {
			tcustid=rs.getString(1);
		}
		st.executeUpdate("insert into logins(custid,password,userid) values('"+tcustid+"','"+password+"','"+uID+"')");
		response.sendRedirect("http://localhost:8080/CRS_p/login-page.html"); 
		
		}
		catch(Exception e)
		{
		System.out.print(e);
		e.printStackTrace();
		}
		
	}

}
