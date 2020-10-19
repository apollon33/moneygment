<?php
//quotes beg
//displays random quotes
function loadMessagesFromFile($file)
{
    if(!file_exists($file))
    {
        return false;
    }

    $fh       = fopen($file, 'r');
    $messages = array();

    while($data = fgets($fh))
    {
        $messages[] = $data;
    }

    fclose($fh);

    return $messages;
}

$messages_from_file = loadMessagesFromFile('news.txt');
$key = array_rand($messages_from_file);
//quotes end
?>

<?php
//questions
function loadMessagesFromFile2($file)
{
    if(!file_exists($file))
    {
        return false;
    }

    $fh       = fopen($file, 'r');
    $messages = array();

    while($data = fgets($fh))
    {
        $messages[] = $data;
    }

    fclose($fh);

    return $messages;
}

$messages_from_fileb = loadMessagesFromFile2('questions.txt');
$keyb = array_rand($messages_from_fileb);
//quotes end

?>