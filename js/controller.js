var myApp = angular.module("myApp",[]);
myApp.controller("myController", function($scope, $http,$location){

	$scope.vote = function(element, int){
		$http.post('vote_process.php', {
			voteDirection: int,
			idOfPost: element.target.parentElement.id
		}).then(function successCallback(response){
			if(int == 1){
				if(response.data == 'notLoggedIn'){
					element.target.parentNode.firstElementChild.innerHTML = "You must be logged in to post.";
				}else if(response.data == 'alreadyVoted'){
					element.target.parentNode.firstElementChild.innerHTML = "You have already voted once.";
				}else{
					element.target.nextElementSibling.innerHTML = "TOTAL: " + JSON.parse(response.data);
				}
			}else if(int == -1){
			if(response.data == 'notLoggedIn'){
					element.target.parentNode.firstElementChild.innerHTML = "You must be logged in to post.";
				}else if(response.data == 'alreadyVoted'){
					element.target.parentNode.firstElementChild.innerHTML = "You have already voted once.";
				}else{
					element.target.previousElementSibling.innerHTML = "TOTAL: " + JSON.parse(response.data);
				}
			}
		},function errorCallback(response){
			console.log(response);
		});
	}

	$scope.follow = function(username, method){
		$http.post('process_follow.php', {
			username: username,
			method: method
		}).then(function successCallback(response){
			location.reload();
			if(method == 'unfollow'){
				$scope.message1 = "No longer following " + username;
			}else if (method == 'follow'){
				$scope.message2 = "Now following " + username;
			}
			
		},function errorCallback(response){
			console.log(response);
		});
	}
});