<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mess</title>
</head>
<style type="text/css">
	body{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		overflow: hidden;
	}
	.container{
		padding: 10px;
		display: flex;
		align-items: center;
		width: 98vw;
		height: 96vh;

	}
	.user{
		box-shadow: 2px 2px 12px gray;
		width: 25%;
		height: 100%;
	}
	.chat{
		box-shadow: 2px 2px 12px gray;
		width: 75%;
		height: 100%;
		margin-left: 10px;
	}
	.holder{
		display: flex;
		justify-content: space-between;
		flex-direction: column;
	}
	.convo{
		width: 100%;
		height: 90vh;
		box-shadow: 2px 2px 12px gray;
	}
	.type{
		width: 100%;
		height: 6vh;
		box-shadow: 2px 2px 12px gray;
	}
	.inputContainer{
		width: 100%;
		margin: 10px;
	}
	.inputtxt{
		width: 90%;
		padding: 10px;
	}
	input[type="submit"]{
		padding: 10px;
		width: 5%;
	}

</style>
<body>
	<div class="container">
		<div class="user">
			
		</div>
		<div class="chat">
			<div class="holder">
				<div class="convo">
					
				</div>
				<div class="type">
					<div class="inputContainer">
						<input type="text" name="" class="inputtxt">
						<input type="submit" name="" value=">">
					</div>
				</div>
			</div>
		</div>	
	</div>
</body>
</html>