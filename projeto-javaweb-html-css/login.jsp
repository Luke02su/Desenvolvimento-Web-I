<%@ page import="java.sql.*" %>
<%@ page import="com.banco.ConexaoBD" %>
<%@ page import="com.sha2.SenhaSha2" %>  <!-- Importando o m�todo de hash -->

<%
    // Alterar "nome" para "usuario"
    String usuario = request.getParameter("usuario");
    String senha = request.getParameter("senha");

    if (usuario != null && senha != null) {
        Connection conn = null;
        PreparedStatement stmt = null;
        ResultSet rs = null;

        try {
            conn = ConexaoBD.getConnection();
            String sql = "SELECT * FROM usuarios WHERE nome_usuario = ? AND senha = ?";
            stmt = conn.prepareStatement(sql);
            stmt.setString(1, usuario); // Use "usuario" aqui
                        
            String senhaHash = SenhaSha2.hashSHA256(senha); /// Hashea a senha digitada pelo usu�rio e passa para a consulta SQL
            stmt.setString(2, senhaHash); // "senha" permanece o mesmo

            rs = stmt.executeQuery();

            if (rs.next()) {
                // Usu�rio autenticado com sucesso, redireciona para 'main.html'
                response.sendRedirect("main.html");
                return; // Retorno para evitar que o resto do c�digo seja executado
            } else {
                // Autentica��o falhou
                out.println("<p style='color:red;'>Usu�rio ou senha incorretos. Tente novamente.</p>");
            }
        } catch (SQLException e) {
            out.println("<p style='color:red;'>Erro ao acessar o banco de dados: " + e.getMessage() + "</p>");
            e.printStackTrace();
        } finally {
            try {
                if (rs != null) rs.close();
                if (stmt != null) stmt.close();
                if (conn != null) conn.close();
            } catch (SQLException e) {
                e.printStackTrace();
            }
        }
    } else {
        out.println("<p style='color:red;'>Por favor, insira o nome de usu�rio e a senha.</p>");
    }
%>
