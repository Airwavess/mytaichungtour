

//Header
var Header = React.createClass({
  render: function(){
    return (
      <div className="jumbotron">
        <h2>行程規劃小幫手</h2>
        <p></p>
        <button type="button" className="btn btn-primary btn-md">創建行程</button>
      </div>
    );
  }
});

//Nav
var Nav = React.createClass({
  render: function(){
    return (
      <nav className="nav">
        <p>行程規劃小幫手</p>
      </nav>
    );
  }
});

//Container
var Container = React.createClass({
  render: function(){
    return (
      <div>
        <Nav />
        <div className="container">
          <Header />
        </div> 
      </div> 
    );
  }
});

//Render
ReactDOM.render(
  <Container />,
  document.getElementById("container")
);