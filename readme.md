# Marvel App
<br/>
<br/>

# What Does It Do?
This is a simple application that pulls data from the [Marvel API](https://developer.marvel.com/documentation/getting_started).  Some of the different data that is pulled includes, a list of characters, character descriptions and comic books associated with the selected character.

<br/>
<br/>

# Features
### `Search Characters`
Allows users to search different Marvel characters.  There are a total of 1,500 different marvel characters included in this app.  

### `Get Character Information`
When a character is selected from the table, the user is re-directed to a character specific page that displays the following: 
- An enlarged image of the selected character.
- A description, if one is available.
- A list of different comic books that the character is featured in.

<br/>
<br/>

# Getting Started

### `API Key`
You'll need to create a valid Marvel API key you can do that [here](https://developer.marvel.com/documentation/getting_started).

### `Create a timestamp` 
I used php for this application, so you can create a new timestamp by doing the following:

```
$date = new DateTime();
$timestamp = $date->getTimestamp();

```

### `Create a hash`
To interact with this api you must use a hash. The formatting required to do so looks like this:

```
$privateKey = 'yourPrivateKey';
$publicKey = 'yourPublicKey'; 
$keys = $privateKey . $publicKey;

//Use the timestamp from the previous step.
$string = $timestamp . $keys;
$md5 = hash('md5', $string);

```

### `Save the previous variables in a hidden file`
If you name the file private.php everything will just work as it should.  If you choose to name the file something else, you will just need to update the apiClass.php include statements.

<br/>

# Technologies used
- PHP
- HTML/CSS
- Datatables
- Jquery
- Bootstrap

<br/>
<br/>

#  Summary
This application was created to provide a source of entertainment for my two sons.  They are both infatuated with Marvel Comics and I thought this would be a good way for them to learn about all of the different characters in the Marvel Universe.

If you would like to have any fetures added or if you would like to make any, just shoot me a message or a pull request.  Thanks for checking out my app.