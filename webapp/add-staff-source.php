<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MySkoo - Add Staff</title>
    <?php include "head-inner.php"; ?>
</head>
<body>
<!-- Main navbar -->
<?php
include 'header.php';
?>
<!-- /main navbar -->

<!-- Page container -->
<div class="page-container" style="min-height:700px">

    <!-- Page content -->
    <div class="page-content"><!-- Main sidebar -->
        <div class="sidebar sidebar-main hidden-xs">
            <?php include "sidebar.php"; ?>
        </div>
        <!-- /main sidebar -->
        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h4><i class="fa fa-pencil position-left"></i> ADD STAFFS</h4>
                    </div>
                    <ul class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="staff.php">Home</a></li>
                        <li class="active">Add Staffs</li>
                    </ul>
                </div>
            </div>
            <!-- /page header -->

            <!-- Content area -->
            <div class="content">

                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Add Staffs
                                </h4>
                            </div>
                            <div class="panel-body no-padding-bottom">
                                <form class="form-horizontal" action="form_basic.htm#">
                                    <div class="form-group">
                                        <label class="control-label col-lg-4">First Name</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Password</label>
                                        <div class="col-lg-8">
                                            <input type="password" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Input with placeholder</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Enter your username...">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Read only field</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" readonly="readonly" value="read only">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Disabled field</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" disabled="disabled" value="disabled">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4">PBirdd value</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" value="http://">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Default select</label>
                                        <div class="col-lg-8">
                                            <select name="select" class="form-control">
                                                <option value="opt1">Usual select box</option>
                                                <option value="opt2">Option 2</option>
                                                <option value="opt3">Option 3</option>
                                                <option value="opt4">Option 4</option>
                                                <option value="opt5">Option 5</option>
                                                <option value="opt6">Option 6</option>
                                                <option value="opt7">Option 7</option>
                                                <option value="opt8">Option 8</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Disabled autocomplete</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Autocomplete is off" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Maximum value</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" maxlength="4" placeholder="Maximum 4 characters">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4 cursor-pointer" for="clickable-label">Focus on label click</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="clickable-label" placeholder="Field focus on label click">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Textarea</label>
                                        <div class="col-lg-8">
                                            <textarea rows="5" cols="5" class="form-control" placeholder="Default textarea"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Basic selects
                                </h4>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" action="form_basic.htm#">
                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Single select</label>
                                        <div class="col-lg-8">
                                            <select name="select" class="form-control">
                                                <option value="opt1">Default select height</option>
                                                <option value="opt2">Option 2</option>
                                                <option value="opt3">Option 3</option>
                                                <option value="opt4">Option 4</option>
                                                <option value="opt5">Option 5</option>
                                                <option value="opt6">Option 6</option>
                                                <option value="opt7">Option 7</option>
                                                <option value="opt8">Option 8</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Multiple select</label>
                                        <div class="col-lg-8">
                                            <select multiple="multiple" class="form-control">
                                                <option selected="selected">Amsterdam</option>
                                                <option selected="selected">Atlanta</option>
                                                <option>Baltimore</option>
                                                <option>Boston</option>
                                                <option>Buenos Aires</option>
                                                <option>Calgary</option>
                                                <option selected="selected">Chicago</option>
                                                <option>Denver</option>
                                                <option>Dubai</option>
                                                <option>Frankfurt</option>
                                                <option>Hong Kong</option>
                                                <option>Honolulu</option>
                                                <option>Houston</option>
                                                <option>Kuala Lumpur</option>
                                                <option>London</option>
                                                <option>Los Angeles</option>
                                                <option>Melbourne</option>
                                                <option>Mexico City</option>
                                                <option>Miami</option>
                                                <option>Minneapolis</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    Basic file inputs
                                </h4>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" action="form_basic.htm#">
                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Default file input</label>
                                        <div class="col-lg-8">
                                            <input type="file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Styled file input</label>
                                        <div class="col-lg-8">
                                            <input type="file" class="file-styled">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Styled file icon</label>
                                        <div class="col-lg-8">
                                            <input type="file" class="file-styled-icon">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-4">File input color</label>
                                        <div class="col-lg-8">
                                            <input type="file" class="file-styled-primary">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-4">File input icon</label>
                                        <div class="col-lg-8">
                                            <input type="file" class="file-styled-primary-icon">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h4 class="panel-title">Input icons</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="form_basic.htm#">
                            <fieldset>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Input with icons</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback has-feedback-left">
                                                    <input type="text" class="form-control input-lg" placeholder="Left icon, input large">
                                                    <div class="form-control-feedback">
                                                        <i class="fa fa-group"></i>
                                                    </div>
                                                </div>

                                                <div class="form-group has-feedback has-feedback-left">
                                                    <input type="text" class="form-control" placeholder="Left icon, input default">
                                                    <div class="form-control-feedback">
                                                        <i class="fa fa-group"></i>
                                                    </div>
                                                </div>

                                                <div class="form-group has-feedback has-feedback-left">
                                                    <input type="text" class="form-control input-sm" placeholder="Left icon, input small">
                                                    <div class="form-control-feedback">
                                                        <i class="fa fa-group"></i>
                                                    </div>
                                                </div>

                                                <div class="form-group has-feedback has-feedback-left">
                                                    <input type="text" class="form-control input-xs" placeholder="Left icon, input mini">
                                                    <div class="form-control-feedback">
                                                        <i class="fa fa-group"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <input type="text" class="form-control input-lg" placeholder="Right icon, input large">
                                                    <div class="form-control-feedback">
                                                        <i class="fa fa-group"></i>
                                                    </div>
                                                </div>

                                                <div class="form-group has-feedback">
                                                    <input type="text" class="form-control" placeholder="Right icon, input default">
                                                    <div class="form-control-feedback">
                                                        <i class="fa fa-group"></i>
                                                    </div>
                                                </div>

                                                <div class="form-group has-feedback">
                                                    <input type="text" class="form-control input-sm" placeholder="Right icon, input small">
                                                    <div class="form-control-feedback">
                                                        <i class="fa fa-group"></i>
                                                    </div>
                                                </div>

                                                <div class="form-group has-feedback">
                                                    <input type="text" class="form-control input-xs" placeholder="Left icon, input mini">
                                                    <div class="form-control-feedback">
                                                        <i class="fa fa-group"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Input with spinners</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback has-feedback-left">
                                                    <input type="text" class="form-control" placeholder="Left spinner">
                                                    <div class="form-control-feedback">
                                                        <i class="fa fa-spinner spinner"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <input type="text" class="form-control" placeholder="Right spinner">
                                                    <div class="form-control-feedback">
                                                        <i class="fa fa-spinner spinner"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Input with smaller icons</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback has-feedback-left">
                                                    <input type="text" class="form-control" placeholder="Left smaller icon">
                                                    <div class="form-control-feedback">
                                                        <i class="fa fa-search text-size-base"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <input type="text" class="form-control" placeholder="Right smaller icon">
                                                    <div class="form-control-feedback">
                                                        <i class="fa fa-search text-size-base"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h4 class="panel-title">Validation states</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="form_basic.htm#">
                            <fieldset>
                                <div class="form-group has-warning has-feedback">
                                    <label class="control-label col-lg-2">Warning with icon</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" placeholder=".has-warning">
                                        <div class="form-control-feedback">
                                            <i class="fa fa-warning"></i>
                                        </div>
                                        <span class="help-block">Warning input helper</span>
                                    </div>
                                </div>

                                <div class="form-group has-success has-feedback">
                                    <label class="control-label col-lg-2">Success with icon</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" placeholder=".has-success">
                                        <div class="form-control-feedback">
                                            <i class="fa fa-check-circle"></i>
                                        </div>
                                        <span class="help-block">Success input helper</span>
                                    </div>
                                </div>

                                <div class="form-group has-error has-feedback">
                                    <label class="control-label col-lg-2">Error with icon</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" placeholder=".has-error">
                                        <div class="form-control-feedback">
                                            <i class="fa fa-close"></i>
                                        </div>
                                        <span class="help-block">Error input helper</span>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h4 class="panel-title">Field options</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="form_basic.htm#">
                            <fieldset>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Tooltip on focus</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" data-popup="tooltip" data-trigger="focus" title="Tooltip on focus" placeholder="Click on input">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Tooltip on hover</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" data-popup="tooltip" title="Tooltip on hover" placeholder="Hover on input">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Rounded input</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control input-rounded" placeholder="Rounded input">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Roundless input</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control input-roundless" placeholder="Roundless input">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Fixed input sizing</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <input type="text" class="form-control" placeholder=".col-xs-3">
                                            </div>

                                            <div class="col-xs-4">
                                                <input type="text" class="form-control" placeholder=".col-xs-4">
                                            </div>

                                            <div class="col-xs-5">
                                                <input type="text" class="form-control" placeholder=".col-xs-5">
                                            </div>
                                        </div>
                                        <span class="help-block">Available in 12 columns sizes since it's based on 12 columns grid</span>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h4 class="panel-title">Sizing options</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="form_basic.htm#">
                            <fieldset>
                                <div class="form-group form-group-xlg">
                                    <label class="control-label col-lg-2">XLarge form group</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" placeholder=".form-group-xlg">
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <label class="control-label col-lg-2">Large form group</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" placeholder=".form-group-lg">
                                    </div>
                                </div>

                                <div class="form-group form-group-sm">
                                    <label class="control-label col-lg-2">Small form group</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" placeholder=".form-group-sm">
                                    </div>
                                </div>

                                <div class="form-group form-group-xs">
                                    <label class="control-label col-lg-2">Mini form group</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" placeholder=".form-group-xs">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Inputs only</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control input-xlg" type="text" placeholder="XLarge input height">
                                                </div>

                                                <div class="form-group">
                                                    <input class="form-control input-lg" type="text" placeholder="Large input height">
                                                </div>

                                                <div class="form-group">
                                                    <input class="form-control" type="text" placeholder="Default input height">
                                                </div>

                                                <div class="form-group">
                                                    <input class="form-control input-sm" type="text" placeholder="Small input height">
                                                </div>

                                                <div class="form-group">
                                                    <input class="form-control input-xs" type="text" placeholder="Mini input height">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <select name="select" class="form-control input-xlg">
                                                        <option value="opt1">XLarge select height</option>
                                                        <option value="opt2">Option 2</option>
                                                        <option value="opt3">Option 3</option>
                                                        <option value="opt4">Option 4</option>
                                                        <option value="opt5">Option 5</option>
                                                        <option value="opt6">Option 6</option>
                                                        <option value="opt7">Option 7</option>
                                                        <option value="opt8">Option 8</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <select name="select" class="form-control input-lg">
                                                        <option value="opt1">Large select height</option>
                                                        <option value="opt2">Option 2</option>
                                                        <option value="opt3">Option 3</option>
                                                        <option value="opt4">Option 4</option>
                                                        <option value="opt5">Option 5</option>
                                                        <option value="opt6">Option 6</option>
                                                        <option value="opt7">Option 7</option>
                                                        <option value="opt8">Option 8</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <select name="select" class="form-control">
                                                        <option value="opt1">Default select height</option>
                                                        <option value="opt2">Option 2</option>
                                                        <option value="opt3">Option 3</option>
                                                        <option value="opt4">Option 4</option>
                                                        <option value="opt5">Option 5</option>
                                                        <option value="opt6">Option 6</option>
                                                        <option value="opt7">Option 7</option>
                                                        <option value="opt8">Option 8</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <select name="select" class="form-control input-sm">
                                                        <option value="opt1">Small select height</option>
                                                        <option value="opt2">Option 2</option>
                                                        <option value="opt3">Option 3</option>
                                                        <option value="opt4">Option 4</option>
                                                        <option value="opt5">Option 5</option>
                                                        <option value="opt6">Option 6</option>
                                                        <option value="opt7">Option 7</option>
                                                        <option value="opt8">Option 8</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <select name="select" class="form-control input-xs">
                                                        <option value="opt1">Mini select height</option>
                                                        <option value="opt2">Option 2</option>
                                                        <option value="opt3">Option 3</option>
                                                        <option value="opt4">Option 4</option>
                                                        <option value="opt5">Option 5</option>
                                                        <option value="opt6">Option 6</option>
                                                        <option value="opt7">Option 7</option>
                                                        <option value="opt8">Option 8</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h4 class="panel-title">Color options</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="form_basic.htm#">
                            <fieldset>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Text color</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control text-danger" value="Red text color">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Border color</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control border-primary border-lg text-teal" placeholder="Primary border color">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Background color</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control bg-danger" placeholder="Danger background color">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Select color</label>
                                    <div class="col-lg-10">
                                        <select name="select" class="form-control bg-teal-400">
                                            <option value="opt1">Select color</option>
                                            <option value="opt2">Option 2</option>
                                            <option value="opt3">Option 3</option>
                                            <option value="opt4">Option 4</option>
                                            <option value="opt5">Option 5</option>
                                            <option value="opt6">Option 6</option>
                                            <option value="opt7">Option 7</option>
                                            <option value="opt8">Option 8</option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h4 class="panel-title">Type options</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="form_basic.htm#">
                            <fieldset>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Datetime</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="datetime" name="datetime">
                                        <span class="help-block">Using <code>input type="datetime"</code></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Date</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="date" name="date">
                                        <span class="help-block">Using <code>input type="date"</code></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Month</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="month" name="month">
                                        <span class="help-block">Using <code>input type="month"</code></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Time</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="time" name="time">
                                        <span class="help-block">Using <code>input type="time"</code></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Week</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="week" name="week">
                                        <span class="help-block">Using <code>input type="week"</code></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Number</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="number" name="number">
                                        <span class="help-block">Using <code>input type="number"</code></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Email</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="email" name="email">
                                        <span class="help-block">Using <code>input type="email"</code></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">URL</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="url" name="url">
                                        <span class="help-block">Using <code>input type="url"</code></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Search</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="search" name="search">
                                        <span class="help-block">Using <code>input type="search"</code></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Tel</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="tel" name="tel">
                                        <span class="help-block">Using <code>input type="tel"</code></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Color</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="color" name="color">
                                        <span class="help-block">Using <code>input type="color"</code></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Range</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="range" name="range" min="0" max="10">
                                        <span class="help-block">Using <code>input type="range"</code></span>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <!-- /form horizontal -->
                <!-- Content area -->

                <script type='text/javascript'>
                    $(document).ready(function() {
                        $(function() {
                            // Default file input style
                            $(".file-styled").uniform({
                                fileButtonHtml: 'Browse'
                            });

                            // Default file input style with icon
                            $(".file-styled-icon").uniform({
                                fileButtonHtml: '<i class="fa fa-plus"></i>'
                            });

                            // Primary file input
                            $(".file-styled-primary").uniform({
                                wrapperClass: 'bg-primary',
                                fileButtonHtml: 'Browse'
                            });

                            // Primary file input
                            $(".file-styled-primary-icon").uniform({
                                wrapperClass: 'bg-primary',
                                fileButtonHtml: '<i class="fa fa-plus"></i>'
                            });
                        });
                    });
                </script>
                <!-- Footer -->
                <div class="footer pt-20">
                    &copy; 2016 Bird - Admin theme by <a href="http://followtechnique.com" target="_blank">FollowTechnique</a>&nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;&nbsp;Version - 1.0.0
                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->
</body>
</html>