function time()
{
    var x = new Date(document.lastModified);
    document.getElementById("ti").innerHTML = x;
}
function submit1()
{
var opt = document.getElementById("drop").value;

if (opt == "0")
    {
        alert("Please Select an Option")
    }
if (opt == "1")
    {
        window.location = 'labs/1.docx';
        alert("File Download Succeed");
    }
if (opt == "2")
    {
        window.location = 'labs/2.docx';
        alert("File Download Succeed");
    }
if (opt == "3")
    {
        window.location = 'labs/3.docx';
        alert("File Download Succeed");
    }
if (opt == "4")
    {
        window.location = 'labs/4.docx';
        alert("File Download Succeed");
    }
if (opt == "5")
    {
        alert("This Lab is not available at the moment, please try again later.")
    }
if (opt == "6")
    {
        window.location = 'labs/6.docx';
        alert("File Download Succeed");
    }
if (opt == "7")
    {
        window.location = 'labs/7.docx';
        alert("File Download Succeed");
    }
if (opt == "8")
    {
        window.location = 'labs/8.docx';
        alert("File Download Succeed");
    }
if (opt == "9")
    {
        window.location = 'labs/9.docx';
        alert("File Download Succeed");
    }
if (opt == "10")
    {
        alert("This Lab is not available at the moment, please try again later.")
    }
if (opt == "11")
    {
        alert("This Lab is not available at the moment, please try again later.")
    }
if (opt == "12")
    {
        alert("This Lab is not available at the moment, please try again later.")
    }
   document.getElementsByName("send1").submit;
   //window.location.href="thankyou.html";
    
}
