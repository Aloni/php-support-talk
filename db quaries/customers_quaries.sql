select * from users;
select * from tasks;

SELECT u.*, t. from users u, tasks t where




SELECT u.*, count(t.status)
FROM users u
LEFT JOIN tasks t
ON u.id = t.userId
WHERE u.userType = 'customer' AND NOT(t.status='closed')
group by u.id
ORDER BY t.status, u.name;


SELECT 