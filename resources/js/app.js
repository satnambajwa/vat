import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter, Route, Switch} from 'react-router-dom'
require('./bootstrap');
import Invoice from "./components/Invoice";
import Dashboard from "./components/Dashboard"

function App(){
    return (
        <div>
            <Route exact path="/" component={Dashboard}/>
            <Route path="/invoice" component={Invoice}/>
        </div>
    );
}

if (document.getElementById('content')) {
    ReactDOM.render(
        <BrowserRouter><App /></BrowserRouter>,
        document.getElementById('content')
    );
}