CREATE OR REPLACE VIEW member_record_view AS
SELECT a.member_id, a.sap_id, a.reference_no,
       a.city_id,a.member_name,a.city_name,
       share.share,share.deposit,loan_outstanding.loan_amount, 
       loan_outstanding.loan_paid,loan_outstanding.interest_paid, 
       loan_outstanding.loan_unpaid
FROM member_view a
LEFT JOIN (SELECT b.member_id,b.loan_amount, b.loan_paid,
                  b.interest_paid,  b.loan_unpaid
	    FROM loan_outstanding b) AS loan_outstanding
ON(a.member_id = loan_outstanding.member_id)
LEFT JOIN (SELECT c.member_id,c.share,c.deposit
            FROM share1_view c
            GROUP BY c.member_id) as share
ON(a.member_id = share.member_id)
ORDER BY a.reference_no;
