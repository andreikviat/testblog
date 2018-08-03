CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `short_description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `posts` (`id`, `title`, `content`, `image`, `date`, `user_id`, `short_description`) VALUES
(1, 'PROTECTING YOUR APPLICATION WITH PROPAUTH (PROPERTY-BASED POLICY EVALUATION)', 'I’ve been working on a library for a while now that kind of distills down some of the ideas of property-based authorization (like XACML) and makes it a bit more accessible to the average developer. Property-based evaluation can be a little tricky to get your head around if you’re used to the usual RBAC world. Let me introduce it briefly.\r\n\r\nProperty-based evaluation is more or less what it sounds like: a system checks the properties of an object (or objects) and looks for different kinds of matches. That much is pretty simple but then you get into the “policies” aspect. This is where the real power comes in. With policies you can define the pass/fail requirements for the checks against an object and see if there’s a good enough match. With something like XACML it gets pretty complicated as it defines policies with XML documents (and we all know how “simple” XML is). There’s all sorts of different combining algorithms for the results like “first wins” or “all must match”. These can, of course, be nested and combined themselves leading to pretty complex policies and a mess if you’re not careful.\r\n\r\nSo, back to PropAuth now. In the work that I’ve been doing I’ve only really seen the need for a more streamlined version of this kind of evaluation. Some of the overall flexibility that XACML provides hasn’t been included in PropAuth, but I haven’t found much of a need for that so far anyway (like nested policies). The PropAuth library provides some of the basic property evaluation handling and policy creation I think could replace a lot of the mish-mash of role-based access control functionality out there and make for much more reusable code.', 'image1.jpg', '2017-11-06 21:00:00', 1, 'I’ve been working on a library for a while now that kind of distills down some of the ideas of property-based authorization (like XACML) and makes it a bit more accessible to the average developer. Property-based evaluation can be a  briefly.\r\n'),
(2, 'Gmail Email Inbox using PHP with IMAP', 'Gmail is the God of all email services. It took the world by storm by providing unlimited storage and exceptional interface. It would be nice if we can create a custom web UI interface for the Gmail service. In this article I will present you the PHP code for creating inbox with the emails from the Gmail. We can enhance this code further and make this as a complete email web client using PHP.\r\n\r\nAccessing a mail server and reading messages can be done by the protocols like IMAP, POP. The messages data read from the mail server will be used for listing emails in a mailbox, creating notification alert about unread messages and for many purposes.\r\nn this code, by using PHP IMAP extension the Gmail server is accessed to fetch the email data. The connection is created by sending the access request with the credentials like host, username, password and more. With this connection, the PHP example code sends a search request with a keyword based on which the array of Gmail messages will be returned. To enhance this application as a full fledged Gmail web client using PHP, we need to send email using Gmail SMTP also. You need to collage the linked article to build a complete application. Also I have written about sending email with attachment using Gmail SMTP.\r\n\r\nIMAP Configuration in PHP Environment and Gmail\r\nPHP contains in-built imap_* functions for connecting and getting accesses with an external mail server. Before executing PHP imap_* functions, make sure that the IMAP is installed and enabled in the PHP configuration file. The phpinfo() function will provide us the PHP configuration information about the installed libraries, extensions and more. For executing this example code in your local environment, follow these steps to install and enable IMAP in your PHP. The last step shows the navigation and the screenshot to configure Gmail settings to allow IMAP access.  ', 'imagess.jpg', '2018-08-03 19:45:08', 1, 'Gmail is the God of all email services. It took the world by storm by providing unlimited storage and exceptional interface. It would be nice if we can create a custom web UI interface for the Gmail service. In this article I will present you the PHP code for creating inbox with the emails from the '),
(3, 'PHP: Hypertext Preprocessor', 'The PHP team is glad to announce the release of the fifth PHP 7.3.0 version, PHP 7.3.0beta1. The rough outline of the PHP 7.3 release cycle is specified in the PHP Wiki. For source downloads of PHP 7.3.0beta1 please visit the download page. Windows sources and binaries can be found on windows.php.net/qa/. Please carefully test this version and report any issues found in the bug reporting system. THIS IS A DEVELOPMENT PREVIEW - DO NOT USE IT IN PRODUCTION! For more information on the new features and other changes, you can read the NEWS file, or the UPGRADING file for a complete list of upgrading notes. These files can also be found in the release archive. The next release would be Beta 2, planned for August 16th. The signatures for the release can be found in the manifest or on the QA site. Thank you for helping us make PHP better.', 'w486.jpg', '2018-08-03 20:06:38', 1, 'The PHP team is glad to announce the release of the fifth PHP 7.3.0 version, PHP 7.3.0beta1. The rough outline of the PHP 7.3 release cycle is specified in the PHP Wiki. For source downloads of PHP 7.3.0beta1 please visit the download page.');


CREATE TABLE `Users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `passwordHash` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `Users` (`id`, `name`, `email`, `role`, `passwordHash`) VALUES
(1, 'Writer', 'writer@domain.com', '2', '$2y$10$ZlDrKvw7gFDp2BelTKRf1unU13nk127PhdEnAm2oOBwq00T.mPM5K');


ALTER TABLE `posts`
  ADD UNIQUE KEY `id` (`id`);


ALTER TABLE `Users`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `Users_Email_uindex` (`email`);


ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `Users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;