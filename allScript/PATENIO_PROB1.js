const CheckPalindrome = (sample_word)=>{

const checker = sample_word.split("").reverse().join("");

if(sample_word === checker){
    console.log(sample_word+" is a Palindrome");
}else{
    console.log(sample_word+" is not a Palindrome");
}

}

CheckPalindrome("Reverse");

//parse json array
var data = [ 
 {"Id": 10004, "PageName": "club"}, 
 {"Id": 10040, "PageName": "qaz"}, 
 {"Id": 10059, "PageName": "jjjjjjj"}
];

$.each(data, function(i, item) {
   alert(data[i].PageName);
});​

$.each(data, function(i, item) {
  alert(item.PageName);
});​

var data=[{'com':'something'},{'com':'some other thing'}];
$.each(data, function() {
  $.each(this, function(key, val){
    alert(val);//here data 
      alert (key); //here key

  });
});