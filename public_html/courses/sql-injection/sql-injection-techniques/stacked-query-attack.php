<?php require_once 'relative_init.php'; ?>
<?php require_once SHARED_PATH . 'head.php'; ?>
<?php require_once SHARED_PATH . 'page_header.php'; ?>
<?php require_once SHARED_PATH . 'legal_disclaimer.php'; ?>


      <p>
        Consider the below PHP code that is vulnerable to a stacked query attack.
      </p>

<pre class="lang-sql default-code-style dark-mode-background">
$query = "SELECT * FROM employee WHERE id='" . $_GET['id'] . "'";</pre>

      <p>
        The following stacked query payload would result in giving the user John Smith a 20%
        raise.
      </p>

<pre class="lang-sql default-code-style dark-mode-background">
1'; UPDATE employee SET salary=salary*1.2 WHERE first_name='Jhon' AND last_name='Smith' -- 1</pre>

      <p>
        Notice the <span class="inline-code">1';</span> at the beginning of the payload.
        This is will input valid data into the query we are injecting to, as well as
        terminate it so that we can stack our own query. Also notice at the end of
        our stacked query payload, we comment out the rest of the SQL query with
        <span class="inline-code">-- 1</span>. It is a good idea to place a space
        after SQL comments, because some DBMS systems will not register the comments
        otherwise. The <span class="inline-code">1</span> after the SQL comment
        is simply so we can visually see that we placed a space after the comment.
      </p>
      <p>
        The PHP query string that will be executed after we inject our payload
        would look like this.
      </p>

<pre class="lang-sql default-code-style dark-mode-background">
$query = "SELECT * FROM employee WHERE id='1'; 
          UPDATE employee SET salary=salary*1.2 
          WHERE first_name='Jhon' AND last_name='Smith'";</pre>

      <p>
        Which will get all columns of the employee table associated with the row
        whose id is 1, as well as give John Smith a 20% salary raise.
      </p>


<?php require_once SHARED_PATH . 'page_footer.php'; ?>