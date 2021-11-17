<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        div.options > label > input {
	visibility: hidden;
}

div.options > label {
	display: block;
	margin: 0 0 0 -10px;
	padding: 0 0 20px 0;
	height: 20px;
	width: 150px;
}

div.options > label > img {
	display: inline-block;
	padding: 0px;
	height:30px;
	width:30px;
	background: none;
}

div.options > label > input:checked +img {
	background: url(http://cdn1.iconfinder.com/data/icons/onebit/PNG/onebit_34.png);
	background-repeat: no-repeat;
	background-position:center center;
	background-size:30px 30px;
}
    </style>
</head>
<body>
    <div class="options">
        <label title="item1">
            <input type="radio" name="foo" value="0" />

            <img />
        </label>
        <label title="item2">
            <input type="radio" name="foo" value="1" />
            Item 2
            <img />
        </label>
        <label title="item3">
            <input type="radio" name="foo" value="2" />
            Item 3
            <img />
        </label>
    </div>
</body>
</html>
