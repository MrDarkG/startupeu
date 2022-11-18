<!doctype html>
<html lang="en">
<style>
    .button{
        font-weight: bold;
        border:#007bff solid 1px;
        padding:0.7rem 1rem;
        border-radius:10px;
    }
    .button-div {
        display: flex;
        justify-content: end;
        align-items: center;
        margin-top: 20px;
    }
    h2{
        font-weight: normal !important;
        opacity: 0.6;
    }
    h5 {
        font-weight:normal;!important
    }
</style>
<body>

    <h2>
        Hi,you're registered by Startup Central Eurasia admin.
    </h2>
    <h5>
        So here is your password : <span style="font-weight: bold!important">{{ $password }}</span>
    </h5>
    <div class="button-div">
        <a
            class="button"
            href="http://beta.startupcentraleurasia.com/login"
        >
            Login here
        </a>
    </div>
</body>
</html>
