<html>
    <head>
        <style>
            button {
                width:40%;
                height:45px;
                border-radius:20px;
                margin-top:50px;
                cursor:pointer;
                font-size:16px;
                font-weight:600;
            }
        </style>
        </head>
        <body>
            <form method="post">
            <input type="button" class="button" value="walk" onclick="walktime()">
            <input type="button" class="button" value="bicycle" onclick="bitime()">
            <input type="button" class="button" value="two wheeler" onclick="twowheeltime()">
            <input type="button" class="button" value="four wheeler" onclick="fourwheeltime()">
            <input type="text" name="a">
        </form>
        </body>
    
    <script>
       function walktime()
       {
        alert("The time is");
       }
       function bitime()
       {
        alert("The time is");
       }
       function twowheeltime()
       {
        alert("The time is");
       }
       function fourwheeltime()
       {
        alert("The time is");
       }
    </script>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $inputData = $_POST["a"];
       $cProgramOutput = shell_exec("gcc -o D:\\c_programs\\run D:\\c_programs\\run.c && D:\\c_programs\\run.exe" . escapeshellarg($inputData));
      echo "<p>C Program Output: $cProgramOutput</p>";
}
?>
</html>
