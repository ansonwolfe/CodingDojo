
Question 1:
	SELECT MONTH(charged_datetime),YEAR(charged_datetime),SUM(amount) 
	FROM billing
	WHERE MONTH(charged_datetime) = '3'  AND YEAR(charged_datetime) ='2012';

Question 2:
	SELECT sum(amount)
	FROM billing
	LEFT JOIN clients ON billing.client_id = clients.client_id
	WHERE clients.client_id = '2';

Question 3:
	SELECT * 
	FROM sites
	WHERE client_id = '10';

Question 4:
	SELECT MONTH(created_datetime), client_id, COUNT(*)
	FROM sites
	WHERE client_id = '1' OR client_id = '20'
	GROUP BY client_id, MONTH(created_datetime);

Question 5:
	SELECT *
	FROM leads
	WHERE registered_datetime >= '2011-01-01' AND registered_datetime <= '2011-02-15';

Question 6:
	SELECT clients.client_id, clients.first_name, clients.last_name, count(*)
	FROM clients
	LEFT JOIN sites ON sites.client_id = clients.client_id
	LEFT JOIN leads ON sites.site_id = leads.site_id
	WHERE leads.registered_datetime >= '2011-01-01' AND leads.registered_datetime <= '2011-12-31'
	GROUP BY clients.client_id;
Question 7:
    SELECT clients.first_name, clients.last_name,     MONTH(leads.registered_datetime), count(leads.leads_id), YEAR(leads.registered_datetime)
    FROM clients
    LEFT JOIN sites ON sites.client_id = clients.client_id
    LEFT JOIN leads ON sites.site_id = leads.site_id
    WHERE MONTH(leads.registered_datetime) >= '1' 
    AND MONTH(leads.registered_datetime) <= '6' 
    AND YEAR(leads.registered_datetime) = '2011'
    GROUP BY MONTH(leads.registered_datetime);
    
    
    SELECT clients.first_name, clients.last_name, MONTH(leads.registered_datetime), YEAR(leads.registered_datetime), COUNT(leads.leads_id) FROM leads
    LEFT JOIN sites ON leads.site_id = sites.site_id
    LEFT JOIN clients ON sites.client_id = clients.client_id
    WHERE leads.registered_datetime >= '2011-01-01' AND leads.registered_datetime <= '2011-6-30'
    GROUP BY MONTH(leads.registered_datetime), clients.client_id;
    
Question 8;

    SELECT clients.first_name, clients.last_name, sites.domain_name, leads.registered_datetime, COUNT(*) FROM leads
    LEFT JOIN sites ON leads.site_id = sites.site_id
    LEFT JOIN clients ON sites.client_id = clients.client_id
    GROUP BY leads.site_id;    
    
Question 9:
    SELECT  YEAR(charged_datetime), MONTH(charged_datetime), client_id,sum(amount)
    FROM billing
    GROUP BY YEAR(charged_datetime), MONTH(charged_datetime), client_id; 
    
    SELECT clients.first_name, clients.last_name, SUM(billing.amount), Month(billing.charged_datetime), YEAR(billing.charged_datetime) FROM clients
    LEFT JOIN billing ON clients.client_id = billing.client_id
    GROUP BY YEAR(billing.charged_datetime), Month(billing.charged_datetime);   
    
Question 10:

    SELECT CONCAT(clients.first_name,' ',clients.last_name) AS client_name, GROUP_CONCAT(sites.domain_name, ' / ') AS sites
    FROM clients
    LEFT JOIN sites ON clients.client_id = sites.client_id
    GROUP BY clients.client_id;
    
    
    