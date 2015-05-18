var React = require('react');
var Router = require('react-router');

var Player = require('./components/Player');
var List = require('./components/List');

var App = (
	<div>
		<h1>Noname</h1>
		<Player />
		<List />
	</div>
);

React.render(App, document.body);