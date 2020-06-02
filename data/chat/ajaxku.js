$(document).ready(function()
{
			//load pesan
			function ambilpesan()
			{
				$(".boxpesan").load("ambil.php");
				var con = document.getElementById("boxpesan");
				con.scrollTop = con.scrollHeight;
			}
			setInterval(ambilpesan,1000);
			//load online
			function ol()
			{
			$(".boxonline").load("online.php");	
			}
			setInterval(ol,1000);
			//kirim pesan chat
			$("#formpesan").submit(function()
			{
				var pesan=$(".input-xlarge").val();
				var uname=$(".uname").val();
				$.ajax({
					url : 'kirim.php',
					type : 'POST',
					data : 'pesan='+pesan+'&uname='+uname,
					success : function(pesan)
					{
						// html5 DOM audio play
						var suara=document.getElementById("suara");
						suara.play();
						if(pesan=="terkirim")
						{
							$(".input-xlarge").val("");
						}
						else
						{
							return false;
						}
					},
					});
				return false;
			
			});
			//hide html audio
			var audio=$('#suara');
			audio.hide();
			//load pesan chat
			function ambilpesan()
			{
				$("#boxpesan").load("ambil.php");
				var con = document.getElementById("boxpesan");
				con.scrollTop = con.scrollHeight;
			}
			setInterval(ambilpesan,1000);
			
});