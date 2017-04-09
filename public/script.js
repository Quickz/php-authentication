

"use strict";

var username = document.getElementById("username");
var password = document.getElementById("password");
var loginBtn = document.getElementById("login");
var enterDown = false;
document.onkeydown = submitLogin;
document.onkeyup = releaseEnter;

/**
 * passes down the required data
 * and make a login request
 */
function login()
{
	var formData = new FormData();
	formData.append(username.name, username.value);
	formData.append(password.name, password.value);

	request("../src/auth/login.php", loginResult, formData);

}


/**
 * makes a logout request
 *
 */
function logout()
{
	request("../src/auth/logout.php", logoutResult);
}


/**
 * makes an http request
 * fileName - destionation
 * callBack - function that's called after the request's completed
 * formData - data that needs to be passed
 */
function request(fileName, callBack, formData)
{
	var xmlHttp = new XMLHttpRequest();
	xmlHttp.onreadystatechange = function()
	{
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
			callBack(xmlHttp.responseText);
	}
	xmlHttp.open("post", fileName);
	xmlHttp.send(formData);
}


/**
 * result of login http request
 *
 */
function loginResult(data)
{
	var response = data;
	console.log(data);
	if (response == "valid")
		location.reload();
	else
		alert("Invalid username or password.");
}


/**
 * result of logout http request
 *
 */
function logoutResult()
{
	location.reload();
}


/**
 *
 *
 */
function submitLogin(e)
{
	if (e.keyCode == 13 && !enterDown &&
		e.target.nodeName == "INPUT")
	{
		enterDown = true;
		login();
	}
}


function releaseEnter()
{
	enterDown = false;
}
