1. Container

```bash
<div class="m-container m-container-xxs">
    <h1>This is the XXS.</h1>
</div>

<div class="m-container m-container-xs">
    <h1>This is the XS.</h1>
</div>

<div class="m-container m-container-md">
    <h1>This is the MD.</h1>
</div>

<div class="m-container m-container-lg">
    <h1>This is the LG.</h1>
</div>

<div class="m-container m-container-xlg">
    <h1>This is the XLG.</h1>
</div>
```

2. Content displaying
   <br>
   For showing content at the center of the Screen - vertical list.

```bash
<div class="m-content full-height column justify-center align-center">
    <div>
        <h1>Content 1</h1>
    </div>
    <div>
        <h1>Content 2</h1>
    </div>
</div>
```

For showing content at the center of the Screen - horizontal list.

```bash
<div class="m-content full-height row justify-center align-center">
    <div>
        <h1>Content 1</h1>
    </div>
    <div>
        <h1>Content 2</h1>
    </div>
</div>
```

Lists of the Content - Only Text

```bash
<div class="m-content column">

    <div class="m-content-list-text radius-xxs box-shadow-xxs">
        <div class="thumb">
            <h1><i class="fa-solid fa-indian-rupee-sign"></i> 300000/-</h1>
        </div>
        <div class="text">
            <h3>School Building repairing</h3>
            <p>
                <label class="xxs">Request Date: <b>20/11/2022</b></label>
                <label class="xs">Status: <b style="color:orange;">Pending</b></label>
            </p>
        </div>
    </div>

    <div class="m-content-list-text radius-xxs box-shadow-xxs">
        <div class="thumb">
            <h1><i class="fa-solid fa-indian-rupee-sign"></i> 300000/-</h1>
        </div>
        <div class="text">
            <h3>School Building repairing</h3>
            <p>
                <label class="xxs">Request Date: <b>20/11/2022</b></label>
                <label class="xs">Status: <b style="color:orange;">Pending</b></label>
            </p>
        </div>
    </div>
</div>
```

Content with 3 Row Div

```bash
<div class="m-content row">
    <div class="row-3">
        <h1>Content 1</h1>
    </div>
    <div class="row-3">
        <h1>Content 2</h1>
    </div>
    <div class="row-3">
        <h1>Content 2</h1>
    </div>
</div>
```

3. Input

```bash
<div class="m-input">
    <label>Email:</label>
    <input type="text" placeholder="Email" />
</div>
```

4. Buttons
   <br/>
   Button syntax

```bash
<button class="m-btn btn-success btn-block md radius-xxs" >Login</button>
```

Button type

```bash
.btn-block
```

Button Color

```bash
.btn-success
.btn-danger
.btn-warning
.btn-info
```

5. Font size

```bash
.xxs
.xs
.sm
.md
.lg
.xlg
.xxlg
```

6. Border radius

```bash
.radius-xxs
.radius-round
```

7. Background color

```bash
.bg-light-success
.bg-light-white
```

8. Box Shadow

```bash
.box-shadow-xxs
```

9. Text align

```bash
.center
.left
.right
```

10. Images

```bash
<div class="m-img radius-round" style="height:60px;width:60px;background-image:url('/assets/icons/logo.jpg');">
</div>
```

11. Margin

```bash
.mar-auto
```

12. Text Color

```bash
.white
.danger
.success
.warning
.info
```

13. Dropdown menu
    <br/>
    HTML

```bash
<div class="m-drop-down">
    <div style="padding:0px;display:flex;flex-direction:row-reverse;">
        <button id="test" style="display:flex;flex-direction:row;" >
            <div class="m-img radius-round" style="height:10px;width:10px;background-image:url('/assets/icons/profile.png');">
            </div>
            <div>
                <i class="fa-solid fa-caret-down"></i>
            </div>
        </button>
    </div>
    <div class="m-drop m-drop-right display-none drop1">
        <ul>
            <li>
                <a href="">This is the text</a>
            </li>
            <li>
                <a href="">This is the text</a>
            </li>
            <li>
                <a href="">This is the text</a>
            </li>
            <li>
                <a href="">This is the text</a>
            </li>
        </ul>
    </div>
</div>
```

JS

```bash
eventOutsideClick(".drop1","#test",function(){
    dropDownToggleHide(".drop1");
});
event("#test","click",function(){
    dropDownToggle(".drop1");
});
```

14. Display Class

```bash
.display-none
.display-block
```

15. Vertical Menu

```bash
<div class="menu-success">
    <ul class="m-list">
        <li class="m-li">
            <a href="" class="m-a"><i class="fa-solid fa-gear"></i> Change Password</a>
        </li>
        <li class="m-li">
            <a href="" class="m-a red"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
        </li>

    </ul>
</div>
```

Menu styles

```bash
.menu-success .menu-danger
```

16. Horizontal Menu

```bash
<div class="menu-h-success radius-xxs">
    <ul class="m-h-list">
        <li class="m-li">
            <a href="" class="m-a">Menu 1</a>
        </li>
        <li class="m-li">
            <a href="" class="m-a">Menu 1</a>
        </li>
        <li class="m-li">
            <a href="" class="m-a">Menu 1</a>
        </li>
        <li class="m-li">
            <a href="" class="m-a">Menu 1</a>
        </li>
    </ul>
</div>
```

17. Title

```bash
<div class="title">
    <h3><i class="fa-solid fa-list"></i> Newest Budget Request</h3>
</div>
```

18.Tables

```bash
<div class="table table-border-danger">
    <table>
        <tbody>
            <tr>
                <td>1</td>
                <td>Department:</td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Budget Name:</td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
```

19. Modals

```bash
<div id="more_details" class="modal" >
    <div class="modal-section">
        <div class="modal-xs add-docs-modal">
            <div class="modal-head">
                <button type="button" class="modal-close"><i class="fa-solid fa-xmark"></i></button>
                <p class="success"><i class="fa-solid fa-info"></i> More Details</p>
            </div>
            <div class="modal-content align_center">

                <h1>Modal content</h1>

            </div>
            <div class="modal-foot">
            </div>
        </div>
    </div>
</div>
```
