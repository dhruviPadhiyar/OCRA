<!-- style-->
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .heading {
        text-align: center;
    }

    .ft:hover{
        color: #0d6efd;
    }

    /* .heading {
        font-weight: bold;
    } */
    form>* {
        margin: 10px;
    }

    .dropbtn {
        background-color: #f9f9f9;
        color: #0f0f0f;
        /* padding: 15px; */
        margin-right: 10px;
        /* font-size: 16px; */
        border: none;
        cursor: pointer;
        min-width: 100px;
        /* box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.1); */
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        position: absolute;
        background-color: #f9f9f9;
        /* box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); */
        z-index: 98;
        max-height: 0;
        min-width: 100px;
        transition: max-height 0.15s ease-out;
        overflow: hidden;
    }

    .dropdown-content a {
        color: black;
        background-color: #f9f9f9;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #e2e2e2;
    }

    .dropdown:hover .dropdown-content {
        max-height: 500px;
        min-width: 160px;
        transition: max-height 0.25s ease-in;
    }

    .dropdown:hover .dropbtn {
        background-color: #f9f9f9;
        border-bottom: 1px solid #e0e0e0;
        transition: max-height 0.25s ease-in;
    }

    textarea {
        /* border: ridge 2px; */
        padding: 5px;
        width: 20em;
        min-height: 5em;
        overflow: auto;
    }
</style>
