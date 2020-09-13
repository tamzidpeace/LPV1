<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>wOOw Skill Test</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            margin: 0;
            padding: 10px;
            line-height: 20px;
        }

        table {
            margin-left: 45px;
        }

        td {
            border: 1px solid #eee;
            padding: 3px;
            text-align: center;
        }

        code {
            color: #007b00;
        }

        a {
            color: red;
        }

        .red {
            color: #E91E63;
        }
    </style>
</head>

<body>
    <div class="content">
        <h1 class="m-b-md" style="font-size: 40px">Welcome...</h1>
        <small>
            <code class="red">Output will be in respective routes, with red color.</code>
            <mark>Use Laravel</mark>
        </small>
        <br />
        <br />1. Some people bought some items from Meena Bazaar, which was recorded in some table of your database.
        Defined as: <code>`users`</code>, <code>`grocery`</code>, <code>`meat`</code> and <code>`order`</code>.
        <br /><b>You have to create migration from the following table instructed and Make Relation in SQL and Eloquent
            (both).</b>
        <br /><br />&emsp;1A. <a target="_blank" href="{{url('most-buy-eloquent')}}">most-buy-eloquent</a> && <a
            target="_blank" href="{{url('most-buy-no-eloquent')}}">most-buy-no-eloquent</a>
        <br />&emsp;The Customer, who has taken the second highest total items.
        <table>
            <tr>
                <td>Customer id</td>
                <td>Order id</td>
                <td>Customer Name</td>
                <td>Total Grocery Buy</td>
                <td>Total Meat Buy</td>
                <td>Total items Taken</td>
            </tr>
        </table><br />
        &emsp;1B. <a target="_blank" href="{{url('all-purchase-eloquent')}}">all-purchase-eloquent</a> && <a
            target="_blank" href="{{url('all-purchase-no-eloquent')}}">all-purchase-no-eloquent</a>
        <br />&emsp;The list of customer, by total items taken in ascending order.
        <table>
            <tr>
                <td>Customer id</td>
                <td>Order id</td>
                <td>Customer Name</td>
                <td>Total Grocery Buy</td>
                <td>Total Meat Buy</td>
                <td>Total items Taken</td>
            </tr>
            <tr>
                <td>1</td>
                <td>2</td>
                <td>Rahim</td>
                <td>1</td>
                <td>4</td>
                <td>8</td>
            </tr>
            <tr>
                <td>4</td>
                <td>3</td>
                <td>Karim</td>
                <td>3</td>
                <td>1</td>
                <td>9</td>
            </tr>
        </table>
        <br />2. <a target="_blank" href="{{url('employee-attendence')}}">employee-attendence</a>. In here show all
        users attendence from <code>attendences</code> table in the following manner. Create migration file and Make
        Relation. <br> Please keep in mind if it friday it'll show <code>Weekend</code>, if it Saturday it'll show
        <code>Off Day</code>
        <table>
            <tr>
                <td>User id</td>
                <td>User Name</td>
                <td>Date</td>
                <td>Duty Start</td>
                <td>Duty End</td>
                <td>Date</td>
            </tr>
        </table>
        <br /><br />3. Give examples of: &emsp;<a target="_blank" href="{{url('sort-js')}}">sort-js</a> (array sort)
        &emsp;<a target="_blank" href="{{url('foreach-js')}}">sort-js</a> (foreach)
        &emsp;<a target="_blank" href="{{url('filter-js')}}">filter-js</a> (array filter) &emsp;<a target="_blank"
            href="{{url('map-js')}}">map-js</a> (array map) &emsp;<a target="_blank"
            href="{{url('reduce-js')}}">reduce-js</a> (array reduce)
        <br /><br />
    </div>


    <div>
        {{ config('calculations.some_key') }}
    </div>
</body>

</html>