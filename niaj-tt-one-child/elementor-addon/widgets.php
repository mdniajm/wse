<?php
class Niaj_Team_Members extends \Elementor\Widget_Base {

	public function get_name() {
		return 'niaj_team_members';
	}

	public function get_title() {
		return esc_html__( 'Team Members', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-elementor';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'team', 'members' ];
	}

	//Registering the controls
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'member_image',
			[
				'label' => __( 'Member Image', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				
			]
		);

		//title
		$this->add_control(
			'member_name',
			[
				'label' => __( 'Member Name', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Niaj', 'elementor-addon' ),
				'placeholder' => __( 'Type your member name here', 'elementor-addon' ),
			]
		);
		$this->add_control(
			'designation',
			[
				'label' => __( 'Designation', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Web Developer', 'elementor-addon' ),
				'placeholder' => __( 'Type designation here', 'elementor-addon' ),
			]
		);
		$this->add_control(
			'social_icons',
			[
				'label' => __( 'Social Media Icons', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'icon',
						'label' => __( 'Icon', 'elementor-addon' ),
						'type' => \Elementor\Controls_Manager::ICONS,
						'default' => [
							'value' => 'fab fa-facebook-f',
							'library' => 'fa-solid',
						],
					],
					[
						'name' => 'link',
						'label' => __( 'Link', 'elementor-addon' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => __( 'https://facebook.com/', 'elementor-addon' ),
						'placeholder' => __( 'Enter social media link here', 'elementor-addon' ),
					],
				],
				'default' => [
					[
						'icon' => 'fab fa-facebook-f',
						'link' => 'https://facebook.com/',
					],
					[
						'icon' => 'fab fa-linkedin-in',
						'link' => 'https://linkedin.com/',
					],
					[
						'icon' => 'fab fa-twitter',
						'link' => 'https://twitter.com/',
					],
					[
						'icon' => 'fab fa-instagram',
						'link' => 'https://instagram.com/',
					],
				],
				'title_field' => '{{{ link }}}',
			]
		);


		

		
				
			
	
		

		$this->end_controls_section();

	



		



	}

	//Rendering the widget

	protected function render() {
		$settings = $this->get_settings_for_display();
		// member image render
		$image = $settings['member_image']['url'];

		?>
		 <div class="row justify-content-center">
                            <div class="team-item-two">
                                <div class="team-thumb-two">
                                    <a href="team-details.html"><img src="<?php echo $image; ?>" alt=""></a>
                                    <div class="team-social-two">
                                        <ul class="list-wrap">
											<?php foreach (  $settings['social_icons'] as $item ) : ?>
											<li><a href="<?php echo $item['link']; ?>"><i class="<?php echo $item['icon']['value']; ?>"></i></a></li>
											<?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="team-content-two">
                                    <h2 class="title"><a href="team-details.html"><?php echo $settings['member_name']; ?></a></h2>
                                    <span><?php echo $settings['designation']; ?></span>
                                </div>
                            </div>
                       
                        
            </div>
            
		
		<?php
		
	}
}  