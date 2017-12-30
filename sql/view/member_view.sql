CREATE OR REPLACE VIEW member_view AS
SELECT a.company_id, a.branch_id, a.id AS member_id,
       a.sap_id, a.reference_no, a.city_id,a.member_status_id,
       a.name AS member_name,
       c.name as city_name,b.telephone_no, d.column_name AS gender,
       e.column_name AS member_status, b.retirement_date,a.deleted_by_user_id
FROM member a
LEFT JOIN (member_detail b, client_column_property d)
ON(a.id = b.member_id AND b.gender_id = d.id)
JOIN (city c, client_column_property e)
ON(a.city_id = c.id AND a.member_status_id = e.id )
ORDER BY c.name;
