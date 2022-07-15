1. Element Selector

```bash
_("#elementid").innerHTML = "hello";
```

2. Event Listener
   <br/>
   Execute function when clicked on outside of the particular DIV.

```bash
eventOutsideClick(".drop1","#test",function(){
    alert("ya");
});
```

Event Listener

```bash
event("#element","click",function(){
    let x = _("#drop1");
    x.innerHTML = "hello";
});
```
