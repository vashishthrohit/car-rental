<?= $header_link ?>
<?= $header ?>
<title><?= $title ?></title>

<!-- Title Area -->
<section>
    <div class="container">
        <div class="row">
            <div class="title-area">
                <p>Add Package</p>
            </div>
        </div>
    </div>
</section>
<!-- End Title Area-->


</div>
<?= $footer ?>

<script>
// function hello() {
//     console.log("hello message");
// }

// let hello = function() {
//     console.log("hello message 2");
// }

// arrow = () => console.log("Arrow function");
// arrow();

// prom = () => {
//     return new Promise((resolve, reject) => {
//         console.log("Fetching data please waite....");
//         var c = 5 * 2;
//         setTimeout(() => {
//             if (c) {
//                 resolve(`The product of value =>  ${c}`);
//             } else {
//                 reject("Here is error !");
//             }
//         }, 3000);
//     });
// }

// onresolve = (resolve) => console.log(resolve);

// onerror = (error) => console.log(error);

// prom().then((resolve) => {
//     func();
//     console.log(resolve);
// }).catch((error) => {
//     console.log(error);
// });

// func = () => alert("ok this is good !");

// async function func() {
//     console.log("Message  => 1");
//     console.log("Message  => 2");
//     await console.log("Message  => 3");
//     console.log("Message  => 4");
//     console.log("Message  => 5");
// }

// console.log("Message  => 6");
// console.log("Message  => 7");
// func().then(() => {
//     console.log('ok success');
// }).catch(() => {
//     console.log('in error');
// });
// console.log("Message  => 8");
// console.log("Message  => 9");

// func();

let prom = new Promise((resolve, reject) => {
    var del = ['1', '2', '3', '4', '5'];
    $.post('<?= base_url("AdminController/delete_package") ?>', {
        del
    }, function(data, text_status, xhr) {
        var data = $.parseJSON(data);
        // console.log(data);
        alert(data);
        // data = [];
        if (!data.length) {
            console.log("array is empty");
            reject();
        } else {
            // console.log(data);
            resolve();
            // console.log(data);
        }
        // alert(data + " delete data");
    });
});

prom.then((resolve) => {
    console.log("this is resolve function");
}).catch((reject) => {
    console.log("Thit is reject function");
});

// function func() {
//     delete_func();
//     // save_fun();
// }

// function delete_func() {
//     return new Promise((resolve, reject) => {
//         var del = ['1', '2', '3', '4', '5'];
//         $.post('<?= base_url("AdminController/delete_package") ?>', {
//             del
//         }, function(data, text_status, xhr) {
//             var data = $.parseJSON(data);
//             // console.log(data);
//             alert(data);
//             if (!data.length) {
//                 console.log("array is empty");
//                 reject();
//             } else {
//                 // console.log(data);
//                 resolve();
//                 // console.log(data);
//             }
//             // alert(data + " delete data");
//         });
//     });
// }

// delete_func().then((resolve) => {
//     save_fun();
// }).catch((reject) => {
//     console.loge("this is not run Function!");
// });

// function save_fun() {
//     console.log("This is save Function !");
// }
</script>
