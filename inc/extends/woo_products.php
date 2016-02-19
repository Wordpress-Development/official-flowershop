<?php

/**
 * Extend Widgets 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	


/**
 *  Official WooCommerce Products (slider)
 */

add_action( 'widgets_init', function(){
     register_widget( 'OFFICIAL_Widget_Products' );
});	


class OFFICIAL_Widget_Products extends WC_Widget {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->widget_cssclass    = '';
		$this->widget_description = __( 'Display a list of your products on your site.', 'woocommerce' );
		$this->widget_id          = 'official_woocommerce_products';
		$this->widget_name        = __( 'Official WooCommerce Products (slider)', 'woocommerce' );
		
		$this->settings           = array(

			'title'  => array(
				'type'  => 'text',
				'std'   => __( 'Products', 'woocommerce' ),
				'label' => __( 'Title', 'woocommerce' )
			),

			'number' => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => 30,
				'std'   => 5,
				'label' => __( 'Total number of products to show', 'woocommerce' )
			),

			'show' => array(
				'type'  => 'select',
				'std'   => '',
				'label' => __( 'Show', 'woocommerce' ),
				'options' => array(
					''         => __( 'All Products', 'woocommerce' ),
					'featured' => __( 'Featured Products', 'woocommerce' ),
					'onsale'   => __( 'On-sale Products', 'woocommerce' ),
				)
			),

			'orderby' => array(
				'type'  => 'select',
				'std'   => 'date',
				'label' => __( 'Order by', 'woocommerce' ),
				'options' => array(
					'date'   => __( 'Date', 'woocommerce' ),
					'price'  => __( 'Price', 'woocommerce' ),
					'rand'   => __( 'Random', 'woocommerce' ),
					'sales'  => __( 'Sales', 'woocommerce' ),
				)
			),

			'order' => array(
				'type'  => 'select',
				'std'   => 'desc',
				'label' => _x( 'Order', 'Sorting order', 'woocommerce' ),
				'options' => array(
					'asc'  => __( 'ASC', 'woocommerce' ),
					'desc' => __( 'DESC', 'woocommerce' ),
				)
			),

			'hide_free' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Hide free products', 'woocommerce' )
			),

			'show_hidden' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Show hidden products', 'woocommerce' )
			),

			// Owlcarousel settings
			'owl_items' => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => 8,
				'std'   => 4,
				'label' => __( 'Number of products in a slide')
			),

			'owl_autoplay' => array(
				'type'  => 'select',
				'std'   => 'false',
				'label' => __( 'Enable Autoplay?' ),
				'options' => array(
					'true'  => __( 'Yes'),
					'false' => __( 'No'),
				)
			),

			'owl_navigation' => array(
				'type'  => 'select',
				'std'   => 'false',
				'label' => __( 'Enable Naivgation (prev/next)?' ),
				'options' => array(
					'true'  => __( 'Yes'),
					'false' => __( 'No'),
				)
			),

			'owl_pagination' => array(
				'type'  => 'select',
				'std'   => 'true',
				'label' => __( 'Enable Pagination (bullets)?' ),
				'options' => array(
					'true'  => __( 'Yes'),
					'false' => __( 'No'),
				)
			),

		);

		parent::__construct();
	}

	/**
	 * Query the products and return them.
	 * @param  array $args
	 * @param  array $instance
	 * @return WP_Query
	 */
	public function get_products( $args, $instance ) {
		$number  = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : $this->settings['number']['std'];
		$show    = ! empty( $instance['show'] ) ? sanitize_title( $instance['show'] ) : $this->settings['show']['std'];
		$orderby = ! empty( $instance['orderby'] ) ? sanitize_title( $instance['orderby'] ) : $this->settings['orderby']['std'];
		$order   = ! empty( $instance['order'] ) ? sanitize_title( $instance['order'] ) : $this->settings['order']['std'];

		$query_args = array(
			'posts_per_page' => $number,
			'post_status'    => 'publish',
			'post_type'      => 'product',
			'no_found_rows'  => 1,
			'order'          => $order,
			'meta_query'     => array()
		);

		if ( empty( $instance['show_hidden'] ) ) {
			$query_args['meta_query'][] = WC()->query->visibility_meta_query();
			$query_args['post_parent']  = 0;
		}

		if ( ! empty( $instance['hide_free'] ) ) {
			$query_args['meta_query'][] = array(
				'key'     => '_price',
				'value'   => 0,
				'compare' => '>',
				'type'    => 'DECIMAL',
			);
		}

		$query_args['meta_query'][] = WC()->query->stock_status_meta_query();
		$query_args['meta_query']   = array_filter( $query_args['meta_query'] );

		switch ( $show ) {
			case 'featured' :
				$query_args['meta_query'][] = array(
					'key'   => '_featured',
					'value' => 'yes'
				);
				break;
			case 'onsale' :
				$product_ids_on_sale    = wc_get_product_ids_on_sale();
				$product_ids_on_sale[]  = 0;
				$query_args['post__in'] = $product_ids_on_sale;
				break;
		}

		switch ( $orderby ) {
			case 'price' :
				$query_args['meta_key'] = '_price';
				$query_args['orderby']  = 'meta_value_num';
				break;
			case 'rand' :
				$query_args['orderby']  = 'rand';
				break;
			case 'sales' :
				$query_args['meta_key'] = 'total_sales';
				$query_args['orderby']  = 'meta_value_num';
				break;
			default :
				$query_args['orderby']  = 'date';
		}

		return new WP_Query( apply_filters( 'woocommerce_products_widget_query_args', $query_args ) );
	}

	/**
	 * Output widget.
	 *
	 * @see WP_Widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		if ( $this->get_cached_widget( $args ) ) {
			return;
		}

		ob_start();

		if ( ( $products = $this->get_products( $args, $instance ) ) && $products->have_posts() ) {
			
			$this->widget_start( $args, $instance );

			echo apply_filters( 'woocommerce_before_widget_product_list', '<div class="official-woocommercer-slider-outter woocommerce"><ul id="official-woocommerce-products" class="owl-carousel">' );

			while ( $products->have_posts() ) {
				
				$products->the_post();
				
				wc_get_template( 'content-widget-product.php', array ( 
					
					'show_rating' => true,
					'show_cart' => true

				));

			}

			echo apply_filters( 'woocommerce_after_widget_product_list', '</ul></div>' );


			$this->widget_end( $args );

			?>
				
			<script type="text/javascript"> 
				jQuery(document).ready(function() {
				 
					jQuery("#official-woocommerce-products").owlCarousel( {

						items : <?php echo $instance['owl_items']; ?>,

						itemsDesktop : [1200,4], // between 1200px and 992px
						itemsDesktopSmall : [992,3], // betweem 992px and 768px
						itemsTablet: [768,2], //  between 480 and 768px 
						itemsMobile : [480,1], // lower than 480
						
						autoPlay:  <?php echo $instance['owl_autoplay']; ?>,
						navigation: <?php echo $instance['owl_navigation']; ?>,
						pagination: <?php echo $instance['owl_pagination']; ?>



				  });
				 
				});
			</script>


		<?php
		}

		wp_reset_postdata();

		echo $this->cache_widget( $args, ob_get_clean() );
	}
}

